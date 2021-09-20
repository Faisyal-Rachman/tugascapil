<?php

class Siswa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function deleteSiswa($id)
    {
        $this->db->trans_begin();
        $this->db->where('for_id', $id);
        if (!$this->db->delete('siswa_translations')) {
            log_message('error', print_r($this->db->error(), true));
        }

        $this->db->where('id', $id);
        if (!$this->db->delete('siswa')) {
            log_message('error', print_r($this->db->error(), true));
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    public function siswaCount($search_title = null, $category = null)
    {
        if ($search_title != null) {
            $search_title = trim($this->db->escape_like_str($search_title));
            $this->db->where("(siswa_translations.title LIKE '%$search_title%')");
        }
        if ($category != null) {
            $this->db->where('shop_categorie', $category);
        }
        $this->db->join('siswa_translations', 'siswa_translations.for_id = siswa.id', 'left');
        $this->db->where('siswa_translations.abbr', MY_DEFAULT_LANGUAGE_ABBR);
        return $this->db->count_all_results('siswa');
    }

    public function getSiswa($limit, $page, $search_title = null, $orderby = null, $category = null, $vendor = null)
    {
      
       // $this->db->join('vendors', 'vendors.id = siswa.vendor_id', 'left');
       $this->db->join('provinsi', 'kode_prov = kode_provinsi', 'left');
        $this->db->join('kota', 'kota.id = kta.kota', 'left');
     //   $this->db->where('siswa_translations.abbr', MY_DEFAULT_LANGUAGE_ABBR);
        $query = $this->db->select('*')->get('kta', $limit, $page);
        return $query->result();
    }

    public function numShopSiswa()
    {
        return $this->db->count_all_results('siswa');
    }

    public function getOneSiswa($id)
    {
        $this->db->select('siswa.*');
        $this->db->where('siswa.id', $id);
        //$this->db->join('vendors', 'vendors.id = siswa.vendor_id', 'left');
        $query = $this->db->get('siswa');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function siswaStatusChange($id, $to_status)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('siswa', array('visibility' => $to_status));
        return $result;
    }

    public function setSiswa($post, $id = 0)
    {
        if (!isset($post['brand_id'])) {
            $post['brand_id'] = null;
        }
        if (!isset($post['virtual_siswa'])) {
            $post['virtual_siswa'] = null;
        }
        $this->db->trans_begin();
        $is_update = false;
        if ($id > 0) {
            $is_update = true;
            if (!$this->db->where('id', $id)->update('siswa', array(
                        'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
                        'jnk' => $post['jnk'],
						'title' => $post['title'],
						'nik' => $post['nik'],
						'kelas' => $post['kelas'],
						'agama' => $post['agama'],
                       'tanggal' =>  $post['tanggal'],
                        'virtual_siswa' => $post['virtual_siswa'],
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
            if (!$this->db->insert('siswa', array(
                        'image' => $post['image'],
                         'jnk' => $post['jnk'],
						'title' => $post['title'],
						'nik' => $post['nik'],
						'kelas' => $post['kelas'],
						'agama' => $post['agama'],
                       'tanggal' =>  $post['tanggal'],
                        'virtual_siswa' => $post['virtual_siswa'],
                        'folder' => $post['folder'],
                        'brand_id' => $post['brand_id'],
                        'time' => time()
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
            $id = $this->db->insert_id();

            $this->db->where('id', $id);
            if (!$this->db->update('siswa', array(
                        'url' => except_letters($_POST['title'][$myTranslationNum]) . '_' . $id
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
        }
        $this->setSiswaTranslation($post, $id, $is_update);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    private function setSiswaTranslation($post, $id, $is_update)
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
                if (!$this->db->where('abbr', $abbr)->where('for_id', $id)->update('siswa_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            } else {
                if (!$this->db->insert('siswa_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            }
            $i++;
        }
    }

    public function getTranslations($id)
    {
        $this->db->where('for_id', $id);
        $query = $this->db->get('siswa_translations');
        $arr = array();
        foreach ($query->result() as $row) {
            $arr[$row->abbr]['title'] = $row->title;
            $arr[$row->abbr]['basic_description'] = $row->basic_description;
            $arr[$row->abbr]['description'] = $row->description;
           
        }
        return $arr;
    }

}
