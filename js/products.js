$(function(){
	var acrylicSlide = $('.acrylicslide').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerPadding: '32px',
		dots: true
	});
	var wireSlide = $('.wireslide').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerPadding: '32px',
		dots: true
	});
	$('.tabbtn__btn').eq(0).addClass('open');
	$('.tabbtn__btn').on('click',function(){
		$('.open').removeClass('open');
		$(this).addClass('open');
		$('.show').removeClass('show');
		const index = $(this).index();
		$('.tabinner__slide').eq(index).addClass('show');
		acrylicSlide.slick('setPosition');
		wireSlide.slick('setPosition');
	});
});




//小計の出力
$(function(){
	//inputが入力され終わったらのイベント発火
    $('.buybox input').change(function(){
      var Cost = $(this).data('cost');//単価の出力
			var rotNum = $(this).val();//値の取得
			var Total = $(this).closest('ul').find('.subtotal__price');//小計欄の取得
			var TotalCost = Cost*rotNum;//小計の出力
			//値が負の数字の場合の条件分岐
			if (rotNum < 0) {
				$(this).val(0);
			}
			$(Total).attr('data-total',TotalCost);//データ属性の小計を代入。
			//条件：単価が0以下の場合
			if (TotalCost < 0) {
				//単価の値に0を代入。
				$(Total).text(0);
			}else{
				//合計値に少数点を追加
				var Costtext = String(TotalCost).replace(/(\d)(?=(\d\d\d)+$)/g, "$1,");
				//小計に単価×数値の値を代入。
				$(Total).text(Costtext);
			}
			//初期値を0にする。
			var Fultotal = 0;
			//小計をループで回す。
			$('.subtotal__price').each(function() {
				//0+小計を足していく
				Fultotal = Fultotal + Number($(this).attr('data-total'));
    	})
			//小計に少数手を付与
			var Fultotaltext = String(Fultotal).replace(/(\d)(?=(\d\d\d)+$)/g, "$1,");
			//合計のspanに合計を追記。
			$('#fultotal').html(Fultotaltext);
      $('#total').html(Fultotaltext);
			$('#contact_cost').html(Fultotaltext);
			$('#contact_cost').val(Fultotaltext);
    });
});

//contact fromの確認画面の出し方
$(function(){
	//accordiontitleがクリックされたらのイベント
	$('.accordiontitle').on('click',function(){
		//条件：（on）のクラス名が入っていればクラス名を外す、なければクラス名を付与

					if($(this).next().hasClass("on")){
						$(this).next().removeClass("on");
						$(this).removeClass("on");
					}else{
						$(this).next().addClass("on");
						$(this).addClass("on");
					}
			});
	//確認画面の処理
	//submit処理をプログラムす売ることができるメゾット
	let input_array = [];
	$('#dummy').click(function() {
		//contactform7のvauleを変数に入れる。
		var input_company = $('input[name="info-company"]').val();//会社名の取得
		var input_name = $('input[name="info-name"]').val();//名前の取得
		var input_furigana = $('input[name="info-furigana"]').val();//フリガナの取得
		var input_address = $('input[name="name-address"]').val();//郵便番号の取得
		var input_from = $('input[name="name-from"]').val();//住所の取得
		var input_number = $('input[name="name-number"]').val();//電話番号の取得
		var input_fax = $('input[name="name-fax"]').val();//FAXの取得
		var input_mail = $('input[name="name-mail"]').val();//メールアドレスの取得
		var input_verification = $('input[name="mail-verification"]').val();//メールアドレス（確認）の取得
		var input_time = $('.time-menu select').val();//配達希望時間の取得
		var input_order = $('.order-menu select').val();//お支払方法の取得
		var input_textarea = $('.name-text textarea').val();//メッセージの取得
		//モーダルウィンドウを表示
		$('#modalbox').fadeIn();
		//条件：inputの中のｖauleに数値が入ってる場合に下記の処理をする。
		//処理：spanにinputの値をテキストで出力する。
		if($('input[name="info-company"]').val() !== ""){
			$('.detail__company span').text(input_company);
		}else if($('input[name="info-company"]').val() == ""){
			$('.detail__company span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('input[name="info-name"]').val() !== ""){
			$('.detail__name span').text(input_name);
		}else if($('input[name="info-name"]').val() == ""){
			$('.detail__name span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('input[name="info-furigana"]').val() !== ""){
			$('.detail__furigana span').text(input_furigana);
		}else if($('input[name="info-furigana"]').val() == ""){
			$('.detail__furigana span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('input[name="name-address"]').val() !== ""){
			$('.detail__address span').text(input_address);
		}else if($('input[name="name-address"]').val() == ""){
			$('.detail__address span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('input[name="name-from"]').val() !== ""){
			$('.detail__from span').text(input_from);
		}else if($('input[name="name-from"]').val() == ""){
			$('.detail__from span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('input[name="name-number"]').val() !== ""){
			$('.detail__number span').text(input_number);
		}else if($('input[name="name-number').val() == ""){
			$('.detail__number span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('input[name="name-fax"]').val() !== ""){
			$('.detail__fax span').text(input_fax);
		}else if($('input[name="name-fax"]').val() == ""){
			$('.detail__fax span').text('なし').addClass('alarm');
		}
		if($('input[name="name-mail"]').val() !== ""){
			$('.detail__mail span').text(input_mail);
		}else if($('input[name="name-mail"]').val() == ""){
			$('.detail__mail span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('input[name="mail-verification"]').val() !== ""){
			$('.detail__verification span').text(input_verification);
		}else if($('input[name="mail-verification"]').val() == ""){
			$('.detail__verification span').text('必須項目が未入力です。').addClass('alarm');
		}
		if($('.time-menu select').val() !== ""){
			$('.detail__time span').text(input_time);
		}
		if($('.order-menu select').val() !== ""){
			$('.detail__order span').text(input_order);
		}
		if($('.name-text textarea').val() !== ""){
			$('.detail__text span').text(input_textarea);
		}else if($('.name-text textarea').val() == ""){
			$('.detail__text span').text('特になし').addClass('alarm');
		}
		//「戻る」ボタンをクリックしたら、閉じる処理	
		$('.returnbtn').click(function() {
			$('#modalbox').fadeOut();
		})

		//内訳の処理
		$('input[name="cost"]').each(function(index){
			var Price = $(this).val();//個数の取得
			var One_cost = $(this).data('cost');//単価の取得
			var Total = Price*One_cost;
			//小計に小数点を付ける処理
			var List_price = String(Total).replace(/(\d)(?=(\d\d\d)+$)/g, "$1,");
			//モーダルウィンドウ内にある内訳の商品項目の取得。
			var check_li = $(this).closest('body').find('.modal').find('.inprice');
			//条件：個数が0の場合
			if(Price == 0){
				//モーダルウィンドウ内にある内訳の商品項目を消す。
				//商品項目が14個/ループ数が14回で一緒なので、ループのindexで階数を取得。
				//eq(index)で$('.inprice')を個別化させ、同じ階層のものが0の時に非表示にする。
				$('.inprice').eq(index).css("display","none");
			}else{
				$(check_li).find('.one_cost span').eq(index).text(Price);
				//内訳に小計を受け渡す。
				$(check_li).find('#intotal').eq(index).text(List_price);
			}
		});

		//送信ボタンの処理
		$('#sendbtn').click(function(){
			//contactfoam7の送信ボタンを押す処理。
			//formのクラス名を指定して、.submit();で送信される。
			$('form.wpcf7-form').submit();
			//押したら、フェードアウトする。
			$('#modalbox').fadeOut();
		});
	});
});