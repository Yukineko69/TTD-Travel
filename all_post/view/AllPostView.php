<?php

namespace all_post\view;

class AllPostView {
  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function recentPostRightView() {
    $html = "";
    foreach ($this->data as $row){
      $html .= '
      <div class="recent-post-container row">
        <div class="post-title-container">
          <h4 class="post-title hvr-animation-blue" href="#detailPostModal'.$row["post_id"].'" data-toggle="modal">'.$row["title"].'</h4>
        </div>
        <div class="datetime-location" style="font-size: 14px;">
          <footer class="blockquote-footer">
            <span>'.$row["publish_date"].'</span>
            <span class="location hvr-animation-blue">'.$row["city"].'</span>
          </footer>
        </div>
        <div class="datetime-location" style="font-size: 14px;">
          <footer class="blockquote-footer">
            <span>Published by </span>
            <span class="username hvr-animation-blue">@tuank62ie1</span>
          </footer>
        </div>
        <p class="post-content text-truncate" style="font-size: 14px;">'.$row["text"].'</p>
        <p class="read-more hvr-animation-blue" href="#detailPostModal'.$row["post_id"].'" data-toggle="modal" style="font-size: 14px;">Continue reading ></p>
      </div>
    ';
    }

    return $html;
  }

  public function archivesView() {
    $html = "";
    foreach ($this->data as $row){
      $date = explode("/", $row["archived_date"]);
      $year = (int)$date[0];
      $month = (int)$date[1];
      $html .= '
      <li class="archive-item grow">
        <div class="row" style="width: 100%; margin-left: auto; margin-right: auto;">
          <div class="col-md" style="padding: 0; margin-left: 3px;">
          <a href="./all_post.php?year='.$year.'&&month='.$month.'" style="color:black; text-decoration:none;"><p class="text">'.$row["archived_date"].'</p></a>          
          </div>
          <div class="col-"><p class="counter">'.$row["post_count"].'</p></div>
        </div>
      </li>
      ';
    }

    return $html;
  }

  public function categoriesView() {
    $html = "";
    foreach($this->data as $row){
      $continent = strtolower($row["continent_name"]);
      $continent = str_replace(' ', '', $continent);
      $html .= '
      <li class="category-item grow">
        <div class="row" style="width: 100%; margin-left: auto; margin-right: auto;">
          <div class="col-md" style="padding: 0; margin-left: 3px;">
          <a href="./all_post.php?categories='.$continent.'" style="text-decoration:none; color:black;"><p class="text">'.$row["continent_name"].'</p></a>
          </div>
          <div class="col-"><p class="counter">'.$row["post_count"].'</p></div>
        </div>
      </li>
      ';
    }

    return $html;
  }

}
