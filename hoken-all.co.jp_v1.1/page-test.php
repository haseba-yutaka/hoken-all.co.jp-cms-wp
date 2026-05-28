<?php
/*
template Name: テストフォーム
*/
?>
<?php
session_start();

//特殊文字をHTMLエンティティ化
function h($value){
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

//都道府県
$prefs = array('hokkaido' => "北海道", 'aomori' => "青森県", 'iwate' => "岩手県", 'miyagi' => "宮城県", 'akita' => "秋田県", 'yamagata' => "山形県", 'fukushima' => "福島県",
	'ibaraki' => "茨城県", 'tochigi' => "栃木県", 'gunma' => "群馬県", 'saitama' => "埼玉県", 'chiba' => "千葉県", 'tokyo' => "東京都", 'kanagawa' => "神奈川県",
	'niigata' => "新潟県", 'toyama' => "富山県", 'ishikawa' => "石川県", 'fukui' => "福井県", 'yamanashi' => "山梨県", 'nagano' => "長野県",
	'gifu' => "岐阜県", 'shizuoka' => "静岡県", 'aichi' => "愛知県",'mie' => "三重県",
	'shiga' => "滋賀県", 'kyoto' => "京都府", 'osaka' => "大阪府", 'hyogo' => "兵庫県", 'nara' => "奈良県", 'wakayama' => "和歌山県",
	'tottori' => "鳥取県", 'shimane' => "島根県", 'okayama' => "岡山県",'hiroshima' => "広島県", 'yamaguchi' => "山口県",
	'tokushima' => "徳島県", 'kagawa' => "香川県", 'ehime' => "愛媛県", 'kochi' => "高知県",
	'fukuoka' => "福岡県", 'saga' => "佐賀県", 'nagasaki' => "長崎県", 'kumamoto' => "熊本県", 'oita' => "大分県", 'miyazaki' => "宮崎県", 'kagoshima' => "鹿児島県", 'okinawa' => "沖縄県");

//性別
$list_sex = array('男性' => "男性", '女性' => "女性");

//配偶者
$list_partner = array('あり' => "あり", 'なし' => "なし");

//お子様
$list_kids = array('あり' => "あり", 'なし' => "なし");

//相談内容
$question_consuls = array("A1" => "家計相談", "A2" => "保険相談", "A3" => "ライフプランニング", "A4" => "教育資金相談", "A5" => "老後資金相談", "A6" => "住宅ローン相談", "A7" => "その他");

//曜日の英和
$weeks = array('Sun' => '日', 'Mon' => '月', 'Tue' => '火', 'Wed' => '水', 'Thu' => '木', 'Fri' => '金', 'Sat' => '土');

//特殊文字をHTMLエンティティに変換
if(!empty($_GET)) foreach($_GET as $key => $value) $_GET[$key] = h($value);

if($_SESSION['form']['flag'] != 'back') unset($_SESSION['form']); //確認ページからの遷移でない場合セッションクリア
elseif($_SESSION['form']['flag'] == 'back') unset($_SESSION['form']['flag']); //確認ページからの遷移である場合はフラグクリア

//ボタンが押されたときの処理
if(!empty($_POST)){
	
	//特殊文字をHTMLエンティティに変換（全角英数字を半角に変換、半角カナは全角に変換）
	foreach($_POST as $key => $value) if(!array($value)) $_POST[$key] = mb_convert_kana(h($value), 'rnKV', "UTF-8");
	if(!empty($_POST['question_consul'])) foreach((array)$_POST['question_consul'] as $key => $value) if(!array($value)) $_POST['question_consul'][$key] = h($value);
	
	//入力内容をセッションに保持
	$_SESSION['form'] = $_POST;
	
	//全角英数字を半角に変換、半角カナは全角に変換
	$_SESSION['form']['last_name'] = mb_convert_kana(h($_SESSION['form']['last_name']), 'rnKV', "UTF-8");
	$_SESSION['form']['first_name'] = mb_convert_kana(h($_SESSION['form']['first_name']), 'rnKV', "UTF-8");
	$_SESSION['form']['city'] = mb_convert_kana(h($_SESSION['form']['city']), 'rnKV', "UTF-8");
	$_SESSION['form']['town'] = mb_convert_kana(h($_SESSION['form']['town']), 'rnKV', "UTF-8");
	$_SESSION['form']['cust_remarks'] = mb_convert_kana(h($_SESSION['form']['cust_remarks']), 'rnKV', "UTF-8");
	
	//エラーチェック
	if($_SESSION['form']['last_name'] == '' || $_SESSION['form']['first_name'] == '') $error['name'] = 'blank';
	if($_SESSION['form']['last_name_kana'] == '' || $_SESSION['form']['first_name_kana'] == '') $error['name_kana'] = 'blank';
	if($_SESSION['form']['sex'] == '') $error['sex'] = 'blank';
	if($_SESSION['form']['birth_year'] == '' || $_SESSION['form']['birth_month'] == '' || $_SESSION['form']['birth_day'] == '') $error['birth_date'] = 'blank';
	elseif(!checkdate($_SESSION['form']['birth_month'], $_SESSION['form']['birth_day'], $_SESSION['form']['birth_year'])) $error['birth_date'] = 'failed';
	if($_SESSION['form']['zipcode'] == '') $error['zipcode'] = 'blank';
	elseif(!preg_match("/^\d{7}$/", str_replace("-", "", $_SESSION['form']['zipcode']))) $error['zipcode'] = 'type';
	if($_SESSION['form']['pref'] == '') $error['pref'] = 'blank';
	if($_SESSION['form']['city'] == '') $error['city'] = 'blank';
	if($_SESSION['form']['town'] == '') $error['town'] = 'blank';
	if($_SESSION['form']['tel'] == '') $error['tel'] = 'blank';
	elseif(!preg_match("/^0[1-9]0\d{8}$/", str_replace("-", "", str_replace("-", "", $_SESSION['form']['tel'])))
		&& !preg_match("/^0[1-9]{3}\d{6}$/", str_replace("-", "", str_replace("-", "", $_SESSION['form']['tel'])))) $error['tel'] = 'type';
	else $_SESSION['form']['tel'] = str_replace("-", "", $_SESSION['form']['tel']);
	
	if($_SESSION['form']['mail'] == '') $error['mail'] = 'blank';
	elseif(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\+\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_SESSION['form']['mail'])) $error['mail'] = 'type';
	
	if($_SESSION['form']['agree'] == '') $error['agree'] = 'blank';
	if($_SESSION['form']['agree'] != '個人情報の取扱いに同意します') $error['agree'] = 'blank';
	if($_SESSION['form']['agree_notice'] == '') $error['agree_notice'] = 'blank';
	if($_SESSION['form']['agree_notice'] != 'ご利用上の注意事項を確認しました') $error['agree_notice'] = 'blank';
	if($_SESSION['form']['partner'] == '') $error['partner'] = 'blank';
	if($_SESSION['form']['kids'] == '') $error['kids'] = 'blank';
  if($_SESSION['form']['job'] == '') $error['job'] = 'blank';
	if($_SESSION['form']['question_consul'] == '' && $_SESSION['form']['purpose_other'] == '') $error['purpose'] = 'blank';
	if($_SESSION['form']['place'] == '') $error['place'] = 'blank';
    if($_SESSION['form']['line_schedule'] == '') $error['line_schedule'] = 'blank';
	
	//次のページに進む
	if(!empty($_POST['confirm']) && empty($error)){
		$_SESSION['form']['flag'] = 'confirm';
		header('Location: confirm/');
	}
}
?>



<?php get_template_part('_include/header'); ?>

<div class="header-height"></div>
  <main role="main" class="js-main">
    <div class="-section-headLower ">
      <div class="-section-headLower-inner -section-inner">
        <h1 class="-head-title" data-text-en="contact">
          <span>無料相談予約</span>
        </h1>
      </div>
    </div>
    <div class="-section-main">
      <div class="-section-inner">

            <div id="contents">
                <div class="inner">
                    <ul class="reservation__step">
                        <li class="reservation__step__item reservation__step__item-active">入力</li>
                        <li class="reservation__step__item">確認</li>
                        <li class="reservation__step__item">完了</li>
                    </ul>
                </div>
                <p class="company_link">
                当社に関するお問い合わせ・保険に関するお問い合わせは<a href="https://company.hoken-all.co.jp/contact" target="_blank">こちら</a>
                </p>
                <?php if(!empty($error)){ ?><p class="message error gtm--click-form-btn-error">入力エラーがありますので修正してください。</p><?php }?>

                    <form name='' action='' method="post" enctype="multipart/form-data" autocomplete="off">		

                        <table class="common customer">
                            <tr class="name">
                                <th>お名前<span class="nece">必須</span></th>
                                <td colspan="2">
                                    <div class="part_wrap">
                                        <div class="part"><span>姓</span><input type="text" name="last_name" value="<?php echo $_SESSION['form']['last_name']; ?>" placeholder="山田" size="10" /></div>
                                        <div class="part"><span>名</span><input type="text" name="first_name" value="<?php echo $_SESSION['form']['first_name']; ?>" placeholder="太郎" size="10" /></div>
                                    </div>
                                    <?php if($error['name'] == 'blank'): ?>
                                    <p class="error">お名前を入力してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr class="name">
                                <th>お名前（フリガナ）<span class="nece">必須</span></th>
                                <td colspan="2">
                                    <div class="part_wrap">
                                        <div class="part"><span>セ<br>イ</span><input type="text" name="last_name_kana" value="<?php echo $_SESSION['form']['last_name_kana']; ?>" placeholder="ヤマダ" size="10" /></div>
                                        <div class="part"><span>メ<br>イ</span><input type="text" name="first_name_kana" value="<?php echo $_SESSION['form']['first_name_kana']; ?>" placeholder="タロウ" size="10" /></div>
                                    </div>
                                    <?php if($error['name_kana'] == 'blank'): ?>
                                    <p class="error">お名前（フリガナ）を入力してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>性別<span class="nece">必須</span></th>
                                <td colspan="2">
                                    <?php if(!empty($list_sex)) foreach($list_sex as $sex):?>
                                        <input type="radio" name="sex" value="<?php echo $sex;?>"<?php if($sex == $_SESSION['form']['sex']) echo 'checked="checked"';?> id="<?php echo $sex;?>" /><label for="<?php echo $sex;?>" class="radio"><?php echo $sex;?></label>
                                        <?php endforeach;?>

                                    <?php if($error['sex'] == 'blank'): ?>
                                    <p class="error">性別を選択してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>生年月日<span class="nece">必須</span></th>
                                <td colspan="2"><label class="select"><select name="birth_year">
                                        <option value=""></option>
                                        <?php for($i = date('Y')-18; $i >= 1920; $i--): ?>
                                        <option value="<?php echo $i; ?>"<?php if($i == $_SESSION['form']['birth_year']) echo " selected=\"selected\""; ?>><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                    </select></label>
                                    年
                                    <label class="select"><select name="birth_month">
                                        <option value=""></option>
                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?php echo $i; ?>"<?php if($i == $_SESSION['form']['birth_month']) echo " selected=\"selected\""; ?>> <?php echo $i; ?></option>
                                        <?php endfor; ?>
                                        </select></label>
                                    月
                                    <label class="select"><select name="birth_day">
                                        <option value=""></option>
                                        <?php for($i = 1; $i <= 31; $i++): ?>
                                        <option value="<?php echo $i; ?>"<?php if($i == $_SESSION['form']['birth_day']) echo " selected=\"selected\""; ?>> <?php echo $i; ?></option>
                                        <?php endfor; ?>
                                        </select></label>
                                    日
                                    <?php if($error['birth_date'] == 'blank'): ?>
                                    <p class="error">生年月日を選択してください。</p>
                                    <?php elseif($error['birth_date'] == 'failed'): ?>
                                    <p class="error">正しい生年月日を選択してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>メールアドレス<span class="nece">必須</span></th>
                                <td colspan="2"><input type="text" name="mail" value="<?php echo $_SESSION['form']['mail']; ?>" size="40" placeholder="info@hoken-all.co.jp" />
                                    <?php if($error['mail'] == 'blank'): ?>
                                    <p class="error">メールアドレスを入力してください。</p>
                                    <?php elseif($error['mail'] == 'type'): ?>
                                    <p class="error">正しいメールアドレスを入力してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>携帯電話番号<span class="nece">必須</span></th>
                                <td colspan="2"><input type="tel" name="tel" value="<?php echo $_SESSION['form']['tel']; ?>" size="25" placeholder="09099999999" />
                                    <p class="explain">意向確認のためのお電話を差し上げています</p>
                                    <?php if($error['tel'] == 'blank'): ?>
                                    <p class="error">電話番号を入力してください。</p>
                                    <?php elseif($error['tel'] == 'type'): ?>
                                    <p class="error">正しい電話番号を入力してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th rowspan="4">住所<span class="nece">必須</span></th>
                                <td class="addtit">郵便番号</td><td class="addtxt"><input id="zipcode" type="tel" name="zipcode" value="<?php echo $_SESSION['form']['zipcode']; ?>" size="10" placeholder="1710014" />
                                    <p class="explain">郵便番号を入力すると自動的に住所が表示されます</p>

                                    <?php if($error['zipcode'] == 'blank'): ?>
                                    <p class="error">郵便番号を入力してください。</p>
                                    <?php elseif($error['zipcode'] == 'type'): ?>
                                    <p class="error">正しい郵便番号を入力してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <td class="addtit">都道府県</td><td class="addtxt"><label class="select"><select id="address1" name="pref">
                                        <option value="">都道府県を選択</option>
                                        <?php if(!empty($prefs)) foreach($prefs as $key => $value): ?>
                                        <option value="<?php echo $value; ?>"<?php if($value == $_SESSION['form']['pref']) echo " selected=\"selected\""; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?></select></label>
                                    <?php if($error['pref'] == 'blank'): ?>
                                    <p class="error">都道府県を選択してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <td class="addtit">市区町村</td><td class="addtxt"><input id="address2" type="text" name="city" value="<?php echo $_SESSION['form']['city']; ?>" size="35" placeholder="豊島区" />
                                    <?php if($error['city'] == 'blank'): ?>
                                    <p class="error">市区町村を入力してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <td class="addtit">番地・建物名</td><td class="addtxt"><input id="address3" type="text" name="town" value="<?php echo $_SESSION['form']['town']; ?>" size="35" placeholder="池袋2-53-5 KDX池袋ウエストビル9F" />
                                    <?php if($error['town'] == 'blank'
                                            || $error['town'] == 'same'): ?>
                                    <p class="error">番地・建物名を入力してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>配偶者の有無<span class="nece">必須</span></th>
                                <td colspan="2">
                                    <?php if(!empty($list_partner)) foreach($list_partner as $partner):?>
                                        <input type="radio" name="partner" value="<?php echo $partner;?>"<?php if($partner == $_SESSION['form']['partner']) echo 'checked="checked"';?> id="配偶者_<?php echo $partner;?>"/><label for="配偶者_<?php echo $partner;?>" class="radio"><?php echo $partner;?></label>
                                        <?php endforeach;?>

                                    <?php if($error['partner'] == 'blank'): ?>
                                    <p class="error">配偶者の有無を選択してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>お子様の有無<span class="nece">必須</span></th>
                                <td colspan="2">
                                    <?php if(!empty($list_kids)) foreach($list_kids as $kids):?>
                                        <input type="radio" name="kids" value="<?php echo $kids;?>"<?php if($kids == $_SESSION['form']['kids']) echo 'checked="checked"';?> id="お子様_<?php echo $kids;?>"/><label for="お子様_<?php echo $kids;?>" class="radio"><?php echo $kids;?></label>
                                        <?php endforeach;?>

                                    <?php if($error['kids'] == 'blank'): ?>
                                    <p class="error">お子様の有無を選択してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>職種<span class="nece">必須</span></th>
                                <td colspan="2">
                                    <label class="select">
                                      <select name="job">
                                        <option value="">選択してください</option>
                                        <option value="会社員"<?php echo $_SESSION['form']['job'] == '会社員' ? ' selected' : ''; ?>>会社員</option>
                                        <option value="契約社員・派遣社員"<?php echo $_SESSION['form']['job'] == '契約社員・派遣社員' ? ' selected' : ''; ?>>契約社員・派遣社員</option>
                                        <option value="主婦"<?php echo $_SESSION['form']['job'] == '主婦' ? ' selected' : ''; ?>>主婦</option>
                                        <option value="パート・アルバイト"<?php echo $_SESSION['form']['job'] == 'パート・アルバイト' ? ' selected' : ''; ?>>パート・アルバイト</option>
                                        <option value="公務員"<?php echo $_SESSION['form']['job'] == '公務員' ? ' selected' : ''; ?>>公務員</option>
                                        <option value="自営業"<?php echo $_SESSION['form']['job'] == '自営業' ? ' selected' : ''; ?>>自営業</option>
                                        <option value="会社役員"<?php echo $_SESSION['form']['job'] == '会社役員' ? ' selected' : ''; ?>>会社役員</option>
                                        <option value="会社経営者"<?php echo $_SESSION['form']['job'] == '会社経営者' ? ' selected' : ''; ?>>会社経営者</option>
                                        <option value="医療従事者"<?php echo $_SESSION['form']['job'] == '医療従事者' ? ' selected' : ''; ?>>医療従事者</option>
                                        <option value="無職"<?php echo $_SESSION['form']['job'] == '無職' ? ' selected' : ''; ?>>無職</option>
                                        <option value="その他"<?php echo $_SESSION['form']['job'] == 'その他' ? ' selected' : ''; ?>>その他</option>
                                      </select>
                                    </label>
                                    <?php if($error['job'] == 'blank'): ?>
						                        <p class="error">職種を選択してください。</p>
						                        <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>世帯年収</th>
                                <td colspan="2">
                                    <label class="select"><select name="income">
                                        <option value=""<?php echo $_SESSION['form']['income'] == '' ? ' selected' : ''; ?>>選択してください</option>
                                        <option value="150万円未満"<?php echo $_SESSION['form']['income'] == '150万円未満' ? ' selected' : ''; ?>>150万円未満</option>
                                        <option value="150～300万円"<?php echo $_SESSION['form']['income'] == '150～300万円' ? ' selected' : ''; ?>>150～300万円</option>
                                        <option value="300～500万円"<?php echo $_SESSION['form']['income'] == '300～500万円' ? ' selected' : ''; ?>>300～500万円</option>
                                        <option value="500～700万円"<?php echo $_SESSION['form']['income'] == '500～700万円' ? ' selected' : ''; ?>>500～700万円</option>
                                        <option value="700～1000万円"<?php echo $_SESSION['form']['income'] == '700～1000万円' ? ' selected' : ''; ?>>700～1000万円</option>
                                        <option value="1000～1500万円"<?php echo $_SESSION['form']['income'] == '1000～1500万円' ? ' selected' : ''; ?>>1000～1500万円</option>
                                        <option value="1500万円以上"<?php echo $_SESSION['form']['income'] == '1500万円以上' ? ' selected' : ''; ?>>1500万円以上</option>
                                    </select></label>
                                    <p class="explain">※ご配偶者様分も含む、おおよその合計金額をご選択ください</p>
                                    </td>
                            </tr>
                            <tr>
                                <th>相談内容<small>（複数選択可）</small><span class="nece">必須</span></th>
                                <td colspan="2">
                                    <ul class="question_consul">
                                        <?php if(!empty($question_consuls)) foreach($question_consuls as $key => $value): ?>
                                        <li><label><input type="checkbox" name="question_consul[<?php echo $key; ?>]" value="<?php echo $value; ?>"
                                          <?php if($_SESSION['form']['question_consul'][$key] == $value) echo " checked"; ?> class="cb-input"><span class="cb-parts"><?php echo $value; ?></span></label></li>
                                        <?php endforeach; ?>
                                      </ul>

                                    <div class="purpose_other"><p>その他<small>（自由入力）</small></p><input type="text" name="purpose_other" value="<?php echo $_SESSION['form']['purpose_other']; ?>" size="35" placeholder="その他の場合はこちらに入力" /></div>

                                    <?php if($error['purpose'] == 'blank'): ?>
                                    <p class="error">相談内容を選択（またはその他に入力）してください。</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>相談希望場所<span class="nece">必須</span></th>
                                <td colspan="2">
                                        <input type="radio" name="place" value="オンライン"<?php if($_SESSION['form']['place'] == "オンライン") echo 'checked="checked"';?> id="相談希望場所_オンライン"><label for="相談希望場所_オンライン" class="radio">オンライン</label>

                                        <input type="radio" name="place" value="お家の近く"<?php if($_SESSION['form']['place'] == "お家の近く") echo 'checked="checked"';?> id="相談希望場所_お家の近く"><label for="相談希望場所_お家の近く" class="radio">お家の近く</label>
                                    
                                        <input type="radio" name="place" value="お家"<?php if($_SESSION['form']['place'] == "お家") echo 'checked="checked"';?> id="相談希望場所_お家"><label for="相談希望場所_お家" class="radio">お家</label>

                                    <?php if($error['place'] == 'blank'): ?>
                                    <p class="error">相談希望場所を選択してください。</p>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <th>LINE日程調整サービス<span class="nece">必須</span></th>
                                <td colspan="2">
                                   <input type="radio" name="line_schedule" value="希望する"<?php if($_SESSION['form']['line_schedule'] == "希望する") echo 'checked="checked"';?> id="LINE日程調整_希望する"><label for="LINE日程調整_希望する" class="radio">希望する</label>

                                   <input type="radio" name="line_schedule" value="希望しない"<?php if($_SESSION['form']['line_schedule'] == "希望しない") echo 'checked="checked"';?> id="LINE日程調整_希望しない"><label for="LINE日程調整_希望しない" class="radio">希望しない</label>

                                    <?php if($error['line_schedule'] == 'blank'): ?>
                                    <p class="error">LINE日程調整サービスのご希望を選択してください。</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>備考</th>
                                <td colspan="2">
                                    <textarea name="cust_remarks"><?php echo $_SESSION['form']['cust_remarks']; ?></textarea>
                                </td>
                            </tr>

                        </table>

                        <table class="common customer">
                        <tr class="ppcheck">
                            <th>ご利用上の注意事項<span class="nece">必須</span></th>
                            <td colspan="2">
                                <p class="link"><a class="js-modal-open" href="" data-target="modal__notice">ご利用上の注意事項</a></p>
                                <label><input type="checkbox" name="agree_notice" value="ご利用上の注意事項を確認しました"<?php if($_SESSION['form']['agree_notice']=="ご利用上の注意事項を確認しました") echo 'checked="checked"';?> class="cb-input"><span class="cb-parts">ご利用上の注意事項を確認しました</span></label>
                                <?php if($error['agree_notice'] == 'blank'): ?>
                                <p class="error">ご利用上の注意事項を確認いただけない場合、お申込みできません。</p>
                                <?php endif; ?></td>
                        </tr>
                        <tr class="ppcheck">
                            <th>個人情報の取扱い<span class="nece">必須</span></th>
                            <td colspan="2">
                                <p class="link"><a class="js-modal-open" href="" data-target="modal__privacy">個人情報の取扱い</a></p>
                                <label><input type="checkbox" name="agree" value="個人情報の取扱いに同意します"<?php if($_SESSION['form']['agree']=="個人情報の取扱いに同意します") echo 'checked="checked"';?> class="cb-input"><span class="cb-parts">個人情報の取扱いに同意します</span></label>
                                <?php if($error['agree'] == 'blank'): ?>
                                <p class="error">個人情報の取扱いに同意いただけない場合、お申込みできません。</p>
                                <?php endif; ?></td>
                        </tr>

                        </table>

                        <div class="registBtn">
                            <input type="submit" name="confirm" value="確認画面へ進む" class="btn gtm--click-form-btn-confirm" />
                        </div>

                    </form>
                </div>
            </div>

      </div>
    </div>
  </main>



<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/footer', null, $args);
?>