<?php
// クラス類の配置場所を階層的に整理する仕組み
// 同じ名前のクラスがあってもトラブルを起こさない
// namespace App\Controller;
// コントローラクラスはCakePHPに用意されているAppController
// クラス内には最低でもindexは定義しておく
// 何も実行することがない場合でもメソッドだけは用意しておく
// class HelloController extends AppController {
// 	public $name = "Hello";
// 	public $autoRender = false;
	// ＊OFFにしておかないと勝手にビューテンプレートを探しに行ってエラーを発生させる
	// public function index() {
		// ファイル名を省略アクセスした時にはindexというファイルが自動的に読み込まれる
		// http://localhost:8888/cakephp/hello/index.html
// 		echo "hello world!";
// 	}
// }

// 違う書き方例2↓（public を指定しないとエラーになる）
// namespace App\Controller;
// class HelloController extends AppController {
// 	public function index() {
// 	$this->name = "Hello";
// 	$this->autoRender = false;
// 		echo "hello world!";
// 	}
// }
// 違う書き方例3↓（public を指定しないとエラーになる）
// namespace App\Controller;
// class HelloController extends AppController {
	// $name = "Hello";
	// $autoRender = false;
// 	public function index() {
// 	$this->name = "Hello";
// 	$this->autoRender = false;
// 		echo "hello world!";
// 	}
// }


// index以外のアクセス
// namespace App\Controller;

// class HelloController extends AppController{
// 	public $name = 'Hello';
// 	public $autoRender = false;
// 	public function index(){
// 		echo "hello world!";
// 	}
	// http://localhost:8888/cakephp/hello/other
// 	public function other(){
// 		echo "これは、index以外の表示です。";
// 	}
// }

// namespace App\Controller;

// class HelloController extends AppController {
// 	public $name = 'Hello';
// 	public $autoRender = false;
// 	public function index(){
// 		$this->setAction("other");
		// $this->redirect("./other");
// 	}
// 	public function other(){
// 		echo "これは、index以外の表示です。";
// 	}
// }

// namespace App\Controller;

// class HelloController extends AppController {
// 	public $name = 'Hello';
// autoRender = true でhelloにアクセスした時Helloフォルダの中にあるテンプレートファイルを読み込んでレイアウトを作成し画面に表示するようになる
	// public $autoRender = true;
	// public function index(){
		// この一文は自動レイアウトをOFFにするためのもの
		// $this->viewBuilder()->autoLayout(false);
// 	}
// }


// /helloにアクセスするとCakePHPのレイアウトで表示されるが、/hello/otherにアクセスするとレイアウトを使わずビューテンプレートが直接表示される
// namespace App\Controller;
// class HelloController extends AppController {
// コントローラ全体に適用される設定と、ここのメソッドに用意する設定それぞれを用意
// initializeメソッドが実行され、その後クラス内のメソッドが実行される
	// public function initialize(){
	// 	$this->name = 'Hello';
	// 	$this->autoRender = false;
	// 	$this->viewBuilder()->autoLayout(false);
	// }
	// public function index(){
	// 	$this->viewBuilder()->autoLayout(true);
	// 	$this->autoRender = true;
	// }
	// public function other(){
	// 	$this->viewBuilder()->autoLayout(false);
	// 	$this->autoRender = true;
	// }
	// }


// namespace App\Controller;
// class HelloController extends AppController {
// 	public function initialize(){
// 		$this->name = 'Hello';
// 		$this->viewBuilder()->autoLayout(true);
// 		$this->viewBuilder()->layout('Hello');
// 	}
// 	public function index(){
// 		$this->set('msg','ヘッダーエレメント!!');
// 		$n = rand(1,2);
// 		$this->set('footer','Hello/footer' . $n);
// 	}
// }

// フォームの送信
namespace App\Controller;
class HelloController extends AppController {
	public function initialize(){
		$this->viewBuilder()->layout('Hello');
		$this->set('msg','Hello/index');
		$this->set('footer','Hello/footer2');
	}
	public function index(){
		$result ="";
		if ($this->request->isPost()) {
			$result = $this->request->data['HelloForm']['date'];
		} else {
			$result = "※何か書いて送信してください。";
		}
		$this->set("result",$result);
	}
}
// 複数選択 POST送信
	// public function index(){
	// 	$result ="";
	// 	if ($this->request->isPost()) {
	// 		$result = "<pre>※送信された情報<br>";
	// 		foreach ($this->request->data['HelloForm'] as $key => $val) {
	// 			$v_str = '';
	// 			foreach ($val as $v) {
	// 			 	$v_str .= $v . ' ';
	// 			 }
	// 			 $result .= $key . ' => ' . $v_str . "<br>";
	// 		}
	// 		$result .= "</pre>";
	// 	} else {
	// 		$result = "※何か書いて送信してください。";
	// 	}
	// 	$this->set("result",$result);
	// }
	// GET送信
	// public function sendForm(){
		// $str = $this->request->query['text1'];
		// $result = "※送信された情報<br>";
		// foreach ($this->request->query as $key => $val) {
		// 	$result .= $key ." => " . $val . "<br>";
		// }
		// if ($str != ""){
		// 	$result = "you type: " . $str;
		// } else {
		// 	$result = "empty.";
		// }
		// sendFormに<script>タグを送信されても無効化することができる h()
// 		$this->set("result",$result);
// 	}
// }

	// // POST送信
	// public function sendForm(){
	// 	$str = $this->request->data('text1');
	// 	$result = "";
	// 	if ($str != "") {
	// 		$result = "you type: ".$str;
	// 	} else {
	// 		$result = "empty.";
	// 	}
		// $this->set("str",$str);
	// 	$this->set("result",h($result));
	// }


















 ?>