<?php
namespace App\Helper;

class  CartHelper{
        public $items = [];
        public $total_price =0;
        public $total_quantity =0;

        public function __construct()
        {
            $this->items= session('cart') ? session('cart') : [];
            $this->total_price=$this->get_total_price();
            $this->total_quantity=$this->get_total_quantity();
        }
        public function view(){
            $cart=session(['cart'=> $this->items]);
//            return $cart;
        }
        public function add($product, $quantity=1)
        {
            $item=[
                'id'=> $product->id,
                'name'=> $product->name,
                'price' => $product->sale_price >0 ? $product->sale_price : $product->price,
                'img'=>$product->img,
                'quantity' => $quantity,
            ];
            //check san pham trong cart chua
            if (isset($this->items[$product->id])){
                //neu co roi thi tang quantity
                $this->items[$product->id]['quantity']+=$quantity;
            } else{
                //chua thi them moi
                $this->items[$product->id]= $item;
            };
            session(['cart'=> $this->items]);
        }
        public  function remove($id){
            //neu da co san pham trong gio hang thi xoa
            if (isset($this->items[$id])){
                unset($this->items[$id]);
            };
            // luu lai session
            session(['cart'=> $this->items]);
        }
        public  function update($id,$quantity=1){
            //neu da co san pham trong gio hang thi xoa
            if (isset($this->items[$id])){
                $this->items[$id]['quantity']=$quantity;
            };
            // luu lai session
            session(['cart'=> $this->items]);
            $this->total_price = $this->get_total_price();
            return true;
        }
        public  function clear(){

            session(['cart'=> []]);
        }
        private function get_total_price(){
            $t = 0;
            foreach ( $this->items as $item ){
                $t += $item['price'] * $item['quantity'];
            };
            return  $t ;
        }
        private function get_total_quantity(){
            $t  = 0;
            foreach ($this->items as $item ){
                $t += $item['quantity'];
            };
            return  $t ;
        }
    };

