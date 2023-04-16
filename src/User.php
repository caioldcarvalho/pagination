<?php

namespace Caio\Pagination;

require_once '../config.php';

class User
{
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $gender;

  public function __construct($id, $first_name, $last_name, $email, $gender = null)
  {
    $this->id = $id;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email = $email;
    $this->gender = $gender;
  }

  public static function getUsers(Pagination $pagination = null)
  {
    $users = json_decode(file_get_contents(PROJ_DIR . 'src/MOCK_DATA.json'));

    if ($pagination !== null) {
      $offset = $pagination->offset();
      $limit = $pagination->itemsPerPage;
      $users = array_slice($users, $offset, $limit);
    }

    return $users;
  }

}

?>