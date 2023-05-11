@php
  // $cart = session('cart');
  // $list = [];
  // foreach($cart as $item){
  //   if($item['id'] != $_GET['id'] AND $item['size'] != $_GET['size'] AND $item['color'] != $_GET['color']){
  //     $list[] = $item;
  //   }
  // }
  // session(['cart'=>null]);
  // session()->save();
  // dd(session('cart'));
  // $product = DB::table('products')->where('id',1)->first();
  // $out = '';
  // foreach (json_decode($product->Stock ,true) as $key => $item) {
  //   if($item['color'] == '#ff0000'){
  //     $out = $item['count'];
  //   }
  // }
  // dd($out);
  $data = [];
  foreach(session('cart') as $cart){
      // جداسازی سشن
      if($cart['id'] == 1){
          // اگر ردیف سشن با ردیف ارسال شده یکی باشد
          $data[] = $cart;
      }
  }
dd($data);
@endphp