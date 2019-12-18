<?php

namespace post\model;
use core\data\model\PDOData;

require_once("core/data/PDOData.php");

class Post {
  public function __contruct() {

  }

  public function getRecentPost() {
    $db = new PDOData();
    $data = $db->doQuery("
      select p.*, l.city
      from post p
      inner join location l
      on l.post_id = p.post_id
      order by p.publish_date desc limit 3;
    ");

    return $data;
  }

  public function getRecentDestination($continent) {
    $db = new PDOData();
    $data = $db->doPreparedQuery("
      select l.continent, p.publish_date
      from location l
      inner join post p
      on p.post_id = l.post_id
      where l.continent = ?
      group by l.continent
      order by p.publish_date desc;
    ", array($continent));

    return $data[0]["publish_date"];
  }

  public function getAllContinent() {
    $db = new PDOData();
    $data = $db->doQuery("
      select c.*, p.publish_date, p.thumbnail_img
      from location l
      inner join continent c
      on c.continent_id = l.continent_id
      inner join post p
      on p.post_id = l.post_id
      group by c.continent_id
      order by p.publish_date desc;
    ");

    return $data;
  }
}
