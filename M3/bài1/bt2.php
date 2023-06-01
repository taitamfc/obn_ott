<?php
  class StopWatch {
    private $startTime;
    private $endTime;
  
    public function getStartTime() {
      return $this->startTime;
    }
  
    public function getEndTime() {
      return $this->endTime;
    }
  
    public function start() {
      $this->startTime = microtime(true);
    }
  
    public function stop() {
      $this->endTime = microtime(true);
    }
  
    public function getElapsedTime() {
      return ($this->endTime - $this->startTime) * 1000;
    }
  }
  
        // Tạo mảng gồm 100,000 số ngẫu nhiên
    $arr = array();
    for ($i = 0; $i < 1000; $i++) {
        $arr[] = rand(0, 1000);
    }
    // Khởi tạo đối tượng StopWatch
    $stopWatch = new StopWatch();
    // Sắp xếp mảng bằng thuật toán selection sort
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
    }
    // Dừng đồng hồ đo thời gian và hiển thị kết quả
    $stopWatch->stop();
    echo "Thời gian thực thi của thuật toán selection sort: " . $stopWatch->getElapsedTime() . " milliseconds";