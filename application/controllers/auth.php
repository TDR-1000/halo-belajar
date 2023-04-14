<?php
defined('BASEPATH') or exit('No direct script access allowed');



class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load database
        $this->load->model('m_auth');
    }

    public function login()
    {

        // var_dump($this->session->get_userdata('logging'));

        if ($this->session->userdata('logging') == TRUE) {
            redirect(base_url('dashboard'));
        } else {
            $this->load->view('auth/v_login');
        }
    }

    public function register()
    {
        $this->load->view('auth/v_register');
    }

    public function login_action()
    {
        $email = $this->input->post('email');

        $where = array(
            'email' => $email
        );

        $query = $this->m_auth->cekUser($where);

        if ($query->num_rows() > 0) {
            $data = $query->row();
            if (password_verify($this->input->post('password'), $data->password)) {
                if ($data->status_user == 1) {
                    $data_session = array(
                        'user' => $data->id_user,
                        'name' => $data->nama_user,
                        'logging' => TRUE
                    );
                    $this->session->set_userdata($data_session);

                    $login['info'] = "loggedin";
                } else {
                    // jika akun belum aktif
                    $login['info'] = "notactive";
                    $login['uid'] = $data->uid;
                }
            } else {
                // jika password salah
                $login['flash'] = "Password Salah!!!";
                $login['info'] = "passnotmatch";
            }
        } else {
            // jika akun tidak ada
            $login['flash'] = "notfound";
            $login['info'] = 0;
        }

        echo json_encode($login);
    }


    public function register_action()
    {
        $email = $this->input->post('email');
        $where = array(
            'email' => $email
        );

        $queryEmail = $this->m_auth->cekUser($where);
        if ($queryEmail->num_rows() > 0) {
            $regis['info'] = false;
            $regis['text'] = "Email Sudah Ada";
        } else {
            $nama = $this->input->post('nama');
            $pass = $this->input->post('password');
            $password = password_hash($pass, PASSWORD_DEFAULT);

            $qryUser = $this->m_auth->getId('id_user', 'hb_user');
            $fetchUser = $qryUser->row();
            $idUser = $fetchUser->id_user + 1;

            $moreUnique = md5(uniqid(rand(), true));

            $user = array(
                'id_user' => $idUser,
                'uid' => $moreUnique,
                'level' => "low",
                'nama_user' => $nama,
                'email_user' => $email
            );

            $response = $this->m_auth->insertData('hb_user', $user);
            if ($response == true) {

                $qryLogin = $this->m_auth->getId('id_login', 'hb_login');
                $fetchLogin = $qryLogin->row();
                $idLogin = $fetchLogin->id_login + 1;

                $login = array(
                    'id_login' => $idLogin,
                    'id_user' => $idUser,
                    'email' => $email,
                    'password' => $password
                );

                $response = $this->m_auth->insertData('hb_login', $login);
                if ($response == true) {
                    $regis['info'] = true;
                    $regis['profile'] = $moreUnique;
                } else {
                    $regis['info'] = false;
                }
            } else {
                $regis['info'] = false;
            }
        }
        echo json_encode($regis);
    }

    public function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect(base_url());
    }

    private function sendMail($user)
    {
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'mail.halobelajar.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@halobelajar.com';
        $mail->Password = 'cobatebak69';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;


        $mail->setFrom('info@halobelajar.com', 'Halo Belajar');

        // Add a recipient
        $where = array(
            'uid' => $user
        );

        $query = $this->m_auth->cekUser($where);
        $emailUser = $query->row();
        $mail->addAddress($emailUser->email_user);


        // Email subject
        $mail->Subject = 'Ayo Aktivasi Akun Kamu';

        // Set email format to HTML
        $mail->isHTML(true);

        $token = md5(uniqid(rand(), true));
        $dataUpdate = array(
            'token_user' => $token
        );
        $update = $this->m_auth->updateData('hb_user', $dataUpdate, $where);

        // Email body content
        $mailContent = "
                <h2>Terimakasih sudah mendaftar di Halo Belajar!</h2>
                <h3>Kamu dapat login setelah akun kamu di aktivasi</h3>
                <h3>--------------------------------------------------</h3>
                <h3>Silahkan klik tombol dibawah ini untuk aktivasi</h3>
                <a href='" . base_url('auth/activatedAccount/_?profile=' . $user . '&token=' . $token) . "'style='font-size:18px;'>Aktivasi Akun Saya</a>
                <br><br><br>
                --------------------------------------------------------
                <h3> Hormat Kami, </h3>
                <br><br>
                <h3> Halo belajar Team </h3>
                ";
        $mail->Body = $mailContent;

        if (!$update) {
            return false;
        } else {
            // Send email
            if (!$mail->send()) {
                // $data['pesan'] = 'Email Tidak Terkirim';
                $sent['message'] = false;
            } else {
                // $data['pesan'] = 'Email Terkirim';
                $sent['message'] = true;
                $sent['mailUser'] = $emailUser->email_user;
            }



            return $sent;
        }
    }


    public function activatedAccount()
    {
        $user = $this->uid = $this->input->get('profile', TRUE);
        $data['uid'] = $user;

        $where = array(
            'uid' => $user
        );
        $query = $this->m_auth->cekUser($where);
        if ($query->num_rows() > 0) {
            $fetch = $query->row();
            if ($fetch->status_user == 1) {
                $this->session->set_flashdata('accountActived', 'Akun kamu sudah di aktivasi');
            } else {
                if (isset($_GET['token'])) {
                    $getToken = $_GET['token'];
                    if ($getToken == $fetch->token_user) {
                        $dataUpdate = array(
                            'status_user' => 1
                        );
                        $update = $this->m_auth->updateData('hb_user', $dataUpdate, $where);
                        if ($update == true) {

                            $this->session->set_flashdata('successActived', 'Akun kamu sudah di aktivasi. Selamat bergabung dengan Kami, Semangat untuk melatih kemampuanmu.');
                        } else {
                            $this->session->set_flashdata('failedActived', 'Akun kamu gagal di aktivasi, mohon ulangi atau kirim ulang token');
                        }
                    } else {
                        $this->session->set_flashdata('tokenDifferent', 'Token kamu sudah expired, ayo kirim ulang token terbaru');
                    }
                } else {
                    $this->session->set_flashdata('tokenNotFound', 'Akun kamu belum di aktivasi, ayo cek email kamu yaa..');
                }
            }
        } else {
            $this->session->set_flashdata('accountNotFound', 'Akun tidak ditemukan!');
        }

        $this->load->view('auth/v_aktivasi', $data);
    }

    public function is_active($uid)
    {
        $where = array(
            'uid' => $uid
        );

        $query = $this->m_auth->cekUser($where);
        $data = $query->row();
        return $data->status_user;
    }

    public function emailSend()
    {
        $user = $this->input->get('profile', TRUE);
        $data['uid'] = $user;
        $this->load->view('auth/v_email', $data);
    }


    public function getEMail()
    {
        $uid = $this->input->get('uid');
        $sendemail = $this->sendMail($uid);

        echo json_encode($sendemail);
    }
}
