<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'erickwahyu19@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;

  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();

  if($_POST['kirim']){
    $admin = 'erickwahyu19@gmail.com'; //ganti email dg email admin (email penerima pesan)

    $nama	= htmlentities($_POST['name']);
    $email	= htmlentities($_POST['email']);
    $judul	= htmlentities($_POST['subject']);
    $pesan	= htmlentities($_POST['message']);

    $pengirim	= 'Dari: '.$nama.' <'.$email.'>';

    echo "oke";
    die;

    if(mail($admin, $judul, $pesan, $pengirim)){
      echo "<script>
      alert('Pesan email berhasil terkirim !'); window.location='../index.php';
      </script>";
      return false;
    }else{
      echo "<script>
      alert('Pesan email gagal terkirim, silahkan coba lagi !'); window.location='../index.php';
      </script>";
      return false;
    }
  }else{
    header("Location:index.php");
  }

?>
