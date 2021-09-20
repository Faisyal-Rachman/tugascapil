<?php

class Galeri_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function deleteGaleri($id)
    {
        $this->db->trans_begin();
        $this->db->where('for_id', $id);
        if (!$this->db->delete('galeri_translations')) {
            log_message('error', print_r($this->db->error(), true));
        }

        $this->db->where('id', $id);
        if (!$this->db->delete('galeri')) {
            log_message('error', print_r($this->db->error(), true));
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    public function galeriCount()
    {
      
        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
        $this->db->where('galeri_translations.abbr', MY_DEFAULT_LANGUAGE_ABBR);
        return $this->db->count_all_results('galeri');
    }

    public function getGaleri($limit, $page, $search_title = null, $orderby = null, $category = null, $vendor = null)
    {
        if ($search_title != null) {
            $search_title = trim($this->db->escape_like_str($search_title));
            $this->db->where("(galeri_translations.title LIKE '%$search_title%')");
        }
        if ($orderby !== null) {
            $ord = explode('=', $orderby);
            if (isset($ord[0]) && isset($ord[1])) {
                $this->db->order_by('galeri.' . $ord[0], $ord[1]);
            }
        } else {
            $this->db->order_by('galeri.id', 'asc');
        }
        if ($category != null) {
            $this->db->where('shop_categorie', $category);
        }
       
        $this->db->join('vendors', 'vendors.id = galeri.vendor_id', 'left');
        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
        $this->db->where('galeri_translations.abbr', MY_DEFAULT_LANGUAGE_ABBR);
        $query = $this->db->select('vendors.name as vendor_name, vendors.id as vendor_id, galeri.*, galeri_translations.title, galeri_translations.description, galeri_translations.abbr, galeri.url, galeri_translations.for_id, galeri_translations.basic_description')->get('galeri', $limit, $page);
        return $query->result();
    }

    public function numShopGaleri()
    {
        return $this->db->count_all_results('galeri');
    }

    public function getOneGaleri($id)
    {
        $this->db->select('vendors.name as vendor_name, vendors.id as vendor_id, galeri.*');
        $this->db->where('galeri.id', $id);
        $this->db->join('vendors', 'vendors.id = galeri.vendor_id', 'left');
        $query = $this->db->get('galeri');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function galeriStatusChange($id, $to_status)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('galeri', array('visibility' => $to_status));
        return $result;
    }

    public function setGaleri($post, $id = 0)
    {
        if (!isset($post['brand_id'])) {
            $post['brand_id'] = null;
        }
        if (!isset($post['virtual_galeri'])) {
            $post['virtual_galeri'] = null;
        }
        $this->db->trans_begin();
        $is_update = false;
        if ($id > 0) {
            $is_update = true;
            if (!$this->db->where('id', $id)->update('galeri', array(
                        'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
                        'galeri_categorie' => $post['galeri_categorie'],
                       
                        'virtual_galeri' => $post['virtual_galeri'],
                        'brand_id' => $post['brand_id'],
                        'time_update' => time()
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
        } else {
            /*
             * Lets get what is default tranlsation number
             * in titles and convert it to url
             * We want our plaform public ulrs to be in default 
             * language that we use
             */
            $i = 0;
            foreach ($_POST['translations'] as $translation) {
                if ($translation == MY_DEFAULT_LANGUAGE_ABBR) {
                    $myTranslationNum = $i;
                }
                $i++;
            }
            if (!$this->db->insert('galeri', array(
                        'image' => $post['image'],
                        'galeri_categorie' => $post['galeri_categorie'],
                                            
                        'virtual_galeri' => $post['virtual_galeri'],
                        'folder' => $post['folder'],
                        'brand_id' => $post['brand_id'],
                        'time' => time()
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
            $id = $this->db->insert_id();

            $this->db->where('id', $id);
            if (!$this->db->update('galeri', array(
                        'url' => except_letters($_POST['title'][$myTranslationNum]) . '_' . $id
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
        }
        $this->setGaleriTranslation($post, $id, $is_update);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    private function setGaleriTranslation($post, $id, $is_update)
    {
        $i = 0;
        $current_trans = $this->getTranslations($id);
        foreach ($post['translations'] as $abbr) {
            $arr = array();
            $emergency_insert = false;
            if (!isset($current_trans[$abbr])) {
                $emergency_insert = true;
            }
            $post['title'][$i] = str_replace('"', "'", $post['title'][$i]);
          
           
            $arr = array(
                'title' => $post['title'][$i],
               
                'description' => $post['description'][$i],
               
                'abbr' => $abbr,
                'for_id' => $id
            );
            if ($is_update === true && $emergency_insert === false) {
                $abbr = $arr['abbr'];
                unset($arr['for_id'], $arr['abbr'], $arr['url']);
                if (!$this->db->where('abbr', $abbr)->where('for_id', $id)->update('galeri_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            } else {
                if (!$this->db->insert('galeri_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            }
            $i++;
        }
    }

    public function getTranslations($id)
    {
        $this->db->where('for_id', $id);
        $query = $this->db->get('galeri_translations');
        $arr = array();
        foreach ($query->result() as $row) {
            $arr[$row->abbr]['title'] = $row->title;
            $arr[$row->abbr]['basic_description'] = $row->basic_description;
            $arr[$row->abbr]['description'] = $row->description;
           
        }
        return $arr;
    }

}
