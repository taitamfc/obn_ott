<?php
$q = new SplQueue();
$q->enqueue('Khương');
$q->enqueue('Phi');
$q->enqueue('Hieu');
$q->enqueue('Long');

// đưa con trỏ về vị trí ban đầu
$q->rewind();

while($q->Valid()){
echo '<br>' .$q->current();
$q->next();
}
