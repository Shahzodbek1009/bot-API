<?php
    define('API_KEY','TOKEN_JOYI');
    $adminuser = "admin_user"; // admin user
    defined("GROUP_CHAT_ID") ? null : define("GROUP_CHAT_ID", "guruh_id_si");
    function del($nomi){
        array_map('unlink', glob("step/$nomi.*"));
    }
    function put($fayl, $nima){
        file_put_contents("$fayl", "$nima");
    }

    function pstep($cid,$zn){
        file_put_contents("step/$cid.step",$zn);
    }

    function step($cid){
        $step = file_get_contents("step/$cid.step");
        $step += 1;
        file_put_contents("step/$cid.step",$step);
    }

    function nextTx($cid,$txt){
        $step = file_get_contents("step/$cid.txt");
        file_put_contents("step/$cid.txt","$step\n$txt");
    }

    function ty($ch){
        return bot('sendChatAction', [
            'chat_id' => $ch,
            'action' => 'typing',
        ]);
    }

    function ACL($callbackQueryId, $text = null, $showAlert = false)
    {
        return bot('answerCallbackQuery', [
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
            'show_alert' => $showAlert,
        ]);
    }

    function bot($method,$datas=[]){
        $url = "https://api.telegram.org/bot".API_KEY."/".$method;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }else{
            return json_decode($res);
        }
    }
    $update = json_decode(file_get_contents('php://input'));
    $message = $update->message;
    $cid = $message->chat->id;
    $admin = "1796076409";
    $cidtyp = $message->chat->type;
    $miid = $message->message_id;
    $firstname = $message->from->first_name;
    $name = $message->chat->first_name;
    $user = $message->from->username;
    $tx = $message->text;
    $callback = $update->callback_query;
    $mmid = $callback->inline_message_id;
    $mes = $callback->message;
    $mid = $mes->message_id;
    $cmtx = $mes->text;
    $mmid = $callback->inline_message_id;
    $idd = $callback->message->chat->id;
    $cbid = $callback->from->id;
    $cbuser = $callback->from->username;
    $data = $callback->data;
    $ida = $callback->id;
    $cbqd = $update->callback_query->data;
    $cqid = $update->callback_query->id;
    $cbins = $callback->chat_instance;
    $cbchtyp = $callback->message->chat->type;
    $step = file_get_contents("step/$cid.step");
    $menu = file_get_contents("step/$cid.menu");
    $stepe = file_get_contents("step/$cbid.step");
    $menue = file_get_contents("step/$cbid.menu");
    mkdir("step");
    $adminstep = file_get_contents("admin/admin.step");
mkdir("bot");
mkdir("bot/$fid");
mkdir("admin");
mkdir("admin/stat");
    $otexe = "✖️ Cancel";
    $otexr = "✖️ Отмена";
    $otex = "✖️ Bekor qilish";
    $otmen = json_encode([
        'inline_keyboard'=>[
            [['text'=>"$otex",'callback_data' => "otex"],],
        ]
    ]);
    $otmenr = json_encode([
        'inline_keyboard'=>[
            [['text'=>"$otexr",'callback_data' => "otexr"],],
        ]
    ]);
    $otmene = json_encode([
        'inline_keyboard'=>[
            [['text'=>"$otexe",'callback_data' => "otexe"],],
        ]
    ]);
    $back = json_encode([
        'inline_keyboard' => [
            [['text' => "🔙 back",'callback_data' => "orqaga"]]
        ]
    ]);
    $back1 = json_encode([
        'inline_keyboard' => [
            [['text' => "🏡 Bosh menu",'callback_data' => "back1"]]
        ]
    ]);
    $backrr = json_encode([
        'inline_keyboard' => [
            [['text' => "🏡 Главное меню",'callback_data' => "backr2"]]
        ]
    ]);
    $backe = json_encode([
        'inline_keyboard' => [
            [['text' => "🏡 Main menu",'callback_data' => "backe2"]]
        ]
    ]);
    $back2 = json_encode([
        'inline_keyboard' => [
            [['text' => "🏡 Bosh menu",'callback_data' => "orqaga2"]]
        ]
    ]);
    $manzil = json_encode(
        ['inline_keyboard' => [
        [['callback_data' => "\nAjoyib, anketa jo'natishga tayyor", 'text' => "Anketani ko'rish"]],
        ]
    ]);
    $manzilr = json_encode(
        ['inline_keyboard' => [
        [['callback_data' => "\n ", 'text' => "Посмотреть форму"]],
        ]
    ]);
    $manzile = json_encode(
        ['inline_keyboard' => [
        [['callback_data' => "\n ", 'text' => "View the form"]],
        ]
    ]);
    $vakan = json_encode([
        'inline_keyboard' => [
            [['text' => "🔍 Ish topish",'callback_data' => "resume"],['text' => "🧑‍💻 Vakansiya berish",'callback_data' => "vk"]],
            [['text' => "🔁 Tilni o'zgartirish",'callback_data' => "lang"]]
        ]
    ]);

    $tasdiq = json_encode(
        ['inline_keyboard' => [
            [['callback_data' => "ok", 'text' => "Yuborish ✔️"],['callback_data' => "clear", 'text' => "Tahrirlash ✖️"],],
        ]
    ]);
    $tasdiqr = json_encode(
        ['inline_keyboard' => [
            [['callback_data' => "ok", 'text' => "Отправить ✔️"],['callback_data' => "clearr", 'text' => "Редактировать ✖️"],],
        ]
    ]);
    $tasdiqe = json_encode(
        ['inline_keyboard' => [
            [['callback_data' => "ok", 'text' => "Send ✔️"],['callback_data' => "cleare", 'text' => "Edit ✖️"],],
        ]
    ]);
    $lan = json_encode([
        'inline_keyboard' => [
            [['text' => "🇺🇿 Uzb",'callback_data' => "uz"],['text' => "🇷🇺 Rus",'callback_data' => "ru"],['text' => "🏴󠁧󠁢󠁥󠁮󠁧󠁿 Eng",'callback_data' => "en"]]
        ]
    ]);
    if(isset($tx)){
        ty($cid);
    }
// ===============================================================================
// ========================
 mkdir('stat');
if ($tx == "/start") {
    bot("sendMessage",[
        'chat_id' => $cid,
        'text' => "Assalomu alaykum $firstname\nIT Jobs kanalining rasmiy botiga xush kelibsiz!\n<b>O'zingizga kerakli tilni tanlang</b>",
        'reply_markup' => $lan,
        'parse_mode'=>'html'
        ]);
        $userlar = file_get_contents("stat/stat.stat");
        $stat_ex = explode("\n", $userlar);
        if (!in_array($cid, $stat_ex)) {
            file_put_contents("stat/stat.stat", "\n" . $cid, FILE_APPEND);
        }
}
if ($tx == "/bstat") {
  $count = substr_count($userlar, "\n");
  $count_member = count(file('stat/stat.stat'))-1;
  bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Bot azolari $count_member",
  ]);
}

$vakanr = json_encode([
    'inline_keyboard' => [
        [['text' => "🔍 Pаботу",'callback_data' => "resumer"],['text' => "🧑‍💻 Bакансии",'callback_data' => "vkr"]],
        [['text' => "🔁 Изменить язык",'callback_data' => "lang"]]
    ]
]);





$vakane = json_encode([
    'inline_keyboard' => [
        [['text' => "🔍 Find a job",'callback_data' => "resumere"],['text' => "🧑‍💻 Send vacancy",'callback_data' => "vkre"]],
        [['text' => "🔁 Change the language",'callback_data' => "lang"]]
    ]
]);
// ==================================================================================================================================================================
// ====================================================================================================================================================================
// ====================================================================================================================================================================
// ====================================================================================================================================================================
if ($data=="en" || $data == "eorqaga45" || $data == "backe2") {
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "If you want to get a job, you can send your resume or fill in the form.\n\nIf you need a developer, you can go to the vacancy section and fill in the form.",
        'reply_markup' => $vakane
    ]);
}
if ($data=="resumere") {
    $ishte = json_encode([
        'inline_keyboard' => [
            [['text' => "📋 Send form",'callback_data' => "eshablon"]],
            [['text'=>"🔙 Back",'callback_data' => "eorqaga45"]]
        ]
    ]);
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "To find a job, you will need to fill in a form or send a resume, which, once successfully submitted to the administrator, will be posted on the IT JOBS channel within 12-24 hours if it meets the requirements. If your knowledge and requirements satisfy employers, they will contact you themselves.",
        'reply_markup' => $ishte
    ]);
}
if ($data == "eshablon") {
    if($data == $otexe){}else{
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "*Please write your first and last name:*\n\nFor example: Ivanov Ivan",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
        pstep($cid,"0");
        put("step/$cbid.menu","resume1");
    }
}
    if($step == "0" and $menu == "resume1"){
        if($data == $otexe){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Write your age:*\n\nFor example: 23 years old",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmene,
        ]);
        nextTx($cid, "\n👨‍💻 <b>Name:</b> ". $tx); 
        step($cid);
    }
}
if($step == "1" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write your profession:*\n\nFor example: Android developer",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
    ]);
    nextTx($cid, "🕙 <b>Age:</b> ". $tx); 
    step($cid);
}
}
if($step == "2" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write the programming languages and technologies you know and can use*\n\nFor example: Java, Kotlin, Android studio",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📌 <b>Profession:</b> ". $tx); 
    step($cid);
    }
}
if($step == "3" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write your level:*\n\nFor example: Junior, middle, senior",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "💻 <b>Technology:</b> ". $tx); 
    step($cid);
    }
}
if($step == "4" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write your education:*\n\nFor example: Higher education, secondary, still studying",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "💡 <b>Level:</b> ". $tx); 
    step($cid);
    }
}
if($step == "5" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Which foreign languages do you know:*\n\nFor example: Russian, English, Turkish",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📑 <b>Education:</b> ". $tx); 
    step($cid);
    }
}
if($step == "6" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write type of work:*\n\nFor example: Remote, In the Office, Depend on Condition",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📎 <b>Foreign languages:</b> ". $tx); 
    step($cid);
    }
}
if($step == "7" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write salary:*\n\nFor example: 500$+",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "🏦 <b>Type of work:</b> ". $tx); 
    step($cid);
    }
}
if($step == "8" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write link of your portfolio:*\n\nFor example: Link, no portfolio",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "💰 <b>Salary:</b> ". $tx); 
    step($cid);
    }
}
if($step == "9" and $menu == "resume1"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write your additional informations:*",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]); 
    nextTx($cid, "💼 <b>Portfolio:</b> ". $tx); 
    step($cid);
    }
}
if($step == "10" and $menu == "resume1"){
    bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write your phone number to contact you as follows:*\n\nFor example: +998901234567",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📝 <b>Additional:</b> ".$tx);
    step($cid);
}
if($step == "11" and $menu == "resume1"){
    if($tx == $otexe){}else{
        if(mb_stripos($tx,"998")!==false){
        bot('sendMessage', [
                'chat_id'=>$cid,
                'text'=>"*The datas have been saved successfully*",
                'parse_mode'=>'markdown',
                'reply_markup' => $manzile,
            ]);
            nextTx($cid, "\n📲 <b>Phone:</b> ".$tx);
            step($cid);
        }else{
            bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write your phone number to contact you as follows:*\n\nFor example: +998901234567",
            'parse_mode' => 'markdown',
            'reply_markup' => $cancel,
        ]);
        }
    }
}
if(isset($data) and $stepe == "12" and $menue == "resume1"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('editMessageText',[
        'chat_id'=>$cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text'=>"<b>Your form is ready, do you confirm all your information?</b>
        $baza",
        'parse_mode'=>'html',
        'reply_markup'=>$tasdiqe,
    ]);
    nextTx($cid, "- ".$data);
    step($cbid);
}

if($data == "ok" and $stepe == "13" and $menue == "resume1"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('sendMessage',[
        'chat_id' => GROUP_CHAT_ID,
        'from_chat_id' => $cid,
        'message_id' => $miid,
        'text'=>"<b>#Xodim</b> $baza\n🙍‍♂️ <b>Telegram:</b> @$cbuser",
        'parse_mode'=>'html',
        ]);
    bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"✅ Your form has been sent to the manager for verification. It will soon be posted on the IT Jobs channel.\nThank you for attention !!!",
        'parse_mode'=>'html',
        'reply_markup'=>$backe,
    ]);
    del($cbid);
}
// =============================================================================================
//=============================================================================================
// =============================================================================================
// =============================================================================================
// ===================vkre============================================================================================================================

if ($data == "vkre") {
    if($data == $otexe){}else{
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "*Write name of your company*\n\nFor example: ООО Smart Soft development.",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
        pstep($cid,"0");
        put("step/$cbid.menu","1rregister");
    }
}
if($step == "0" and $menu == "1rregister"){
    if($data == $otexe){}else{
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*What kind of developer do you need*\n\nFor example: Android разработчик.",
        'parse_mode' => 'markdown',
        'reply_markup' => $otmene,
    ]);
    nextTx($cid, "\n🏬 <b>Company:</b> ". $tx); 
    step($cid);
}
}
    if($step == "1" and $menu == "1rregister"){
        if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write the programming languages and technologies that the employee should know:*\n\nFor example: Java, Kotlin, Android Studio",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
        nextTx($cid, "🗳 <b>Vacancy:</b> ". $tx); 
        step($cid);
    }
}
if($step == "2" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*What should be the level and experience of the developer*\n\nFor example: Junior/middle/senior, at least 1 year experience",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "💻  <b>Technology:</b> ". $tx); 
    step($cid);
    }
}

if($step == "3" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Which foreign languages the developer is required to know*\n\nFor example: Russian and English",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "💡 <b>Level:</b> ". $tx); 
    step($cid);
    }
}
if($step == "4" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Education*\n\nFor example: High, Secondary",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📎 <b>Foreign languages:</b> ". $tx); 
    step($cid);
    }
}
if($step == "5" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write the area where the office is located*\n\nFor example: Toshkent city",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "🎓 <b>Education:</b> ". $tx); 
    step($cid);
    }
}
if($step == "6" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*What type of work*\n\nFor example: Online or in the office",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "🏢 <b>Territory:</b> ". $tx); 
    step($cid);
    }
}
if($step == "7" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write type of work*\n\nFor example: Permanent workplace",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📓 <b>Working condition:</b> ". $tx);
    step($cid);
    }
}
if($step == "8" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Work schedule*\n\nНапример: For example: 6/1, from 9:00 to 18:00",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📅 <b>Type of work:</b> ".$tx);
    step($cid);
    }
}
if($step == "9" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write the apply time*\n\nFor example: from 9:00 to 18:00  ",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "⏳ <b>Work schedule:</b> ".$tx);
    step($cid);
    }
}

if($step == "10" and $menu == "1rregister"){
    if($tx == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Salary*\n\nFor example: 500$-2000$",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
        nextTx($cid, "⏰ <b>Time to apply:</b> ".$tx);
        step($cid);
    }
}
if($step == "11" and $menu == "1rregister"){
    if($tx == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Basically what is required of an developer*\n\nFor example: At least 2 years of experience",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
        nextTx($cid, "💰 <b>Salary:</b> ".$tx);
        step($cid);
    }
}
if($step == "12" and $menu == "1rregister"){
    if($tx == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write more job information:*",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
        nextTx($cid, "❗️ <b>Requirements:</b> ".$tx);
        step($cid);
    }
}
if($step == "13" and $menu == "1rregister"){
    if($data == $otexe){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write the name of the person in charge*",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmene,
        ]);
    nextTx($cid, "📝 <b>Additional:</b> ". $tx); 
    step($cid);
    }
}
if($step == "14" and $menu == "1rregister"){
    bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write a phone number to contact you*\n\nFor example: +998901234567",
            'parse_mode' => 'markdown',
            'reply_markup' => $cancel,
        ]);
    nextTx($cid, "\n👨‍💼 <b>Responsible:</b> ".$tx);
    step($cid);
}
if($step == "15" and $menu == "1rregister"){
    if($tx == $otexe){}else{
        if(mb_stripos($tx,"998")!==false){
        bot('sendMessage', [
                'chat_id'=>$cid,
                'text'=>"*The datas have been saved successfully*",
                'parse_mode'=>'markdown',
                'reply_markup' => $manzile,
            ]);
            nextTx($cid, "📲 <b>Phone:</b> ".$tx);
            step($cid);
        }else{
            bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Write a phone number to contact you*\n\nFor example: +998901234567",
            'parse_mode' => 'markdown',
            'reply_markup' => $cancel,
        ]);
        }
    }
}

if(isset($data) and $stepe == "16" and $menue == "1rregister"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('editMessageText',[
        'chat_id'=>$cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text'=>"<b>Your form is ready, do you confirm all your information?</b>
        $baza",
        'parse_mode'=>'html',
        'reply_markup'=>$tasdiqe,
    ]);
    nextTx($cid, "".$data);
    step($cbid);
}
if($data == "ok" and $stepe == "17" and $menue == "1rregister"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('sendMessage',[
        'chat_id' => GROUP_CHAT_ID,
        'from_chat_id' => $cid,
        'message_id' => $miid, 
        'text'=>"<b>#Vakansiya</b> $baza\n 🙍‍♂️ <b>Telegram:</b> @$cbuser",//<code>$baza</code>
        'parse_mode'=>'html',
        ]);
    bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"✅ Your form has been sent to the manager for verification. It will soon be posted on the IT Jobs channel.\nThank you for attention !!!",
        'parse_mode'=>'html',
        'reply_markup'=>$backe,
    ]);
    del($cbid);
}
// ==================================================================================================================================================================
// ====================================================================================================================================================================
// ====================================================================================================================================================================
// ====================================================================================================================================================================

if ($data=="ru" || $data == "rorqaga45" || $data == "backr2") {
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "Если вы хотите устроиться на работу, перейдите в раздел 'Найти работу', заполните и отправьте специальную форму и если работодателям подходит ваше предложение и уровень знаний, то они свяжутся с вами.\n\nЕсли вам нужен сотрудник/кадр, то вы можете выбрать отдел 'Оставить вакансию' и оставить свое предложение.",
        'reply_markup' => $vakanr
    ]);
}
if ($data == "resumer") {
    $ishtr = json_encode([
        'inline_keyboard' => [
            [['text' => "📋 Заполните форму",'callback_data' => "shablonr"]],
            [['text'=>"🔙 Назад",'callback_data' => "rorqaga45"]]
        ]
    ]);
    bot('editMessageText', [
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "Чтобы найти работу, вам следует заполнить шаблон. После того, как шаблон будет успешно отправлен администратору, они проверят и разместят на канал IT JOBS в течение 2-ое суток. Работодатель свяжется с вами, если работодателям подходит ваше предложение и уровень знаний, то они свяжутся с вами.",
        'parse_mode' => 'markdown',
        'reply_markup' => $ishtr
    ]);
}

if ($data == "shablonr") {
    if($data == $otexr){}else{
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "*Введите имя и фамилию*\n\nНапример: Иванов Иван",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
        pstep($cid,"0");
        put("step/$cbid.menu","resumer");
    }
}
    if($step == "0" and $menu == "resumer"){
        if($data == $otexr){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Введите возраст*\n\nНапример: 25 лет",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmenr,
        ]);
        nextTx($cid, "\n👨‍💻 <b>Имя:</b>". $tx); 
        step($cid);
    }
}
if($step == "1" and $menu == "resumer"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Введите профессию*\n\nНапример: Android developer",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
    ]);
    nextTx($cid, "🕙 <b>Возраст:</b> ". $tx); 
    step($cid);
}
}
if($step == "2" and $menu == "resumer"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Введите свободно владеющий язык программирования*\n\nНапример: Java, Kotlin, Android Studio",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📌 <b>Профессия:</b> ". $tx); 
    step($cid);
    }
}
if($step == "3" and $menu == "resumer"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Введите уровень владения *\n\nНапример: Junior, Middle, Senior",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "💻 <b>Технология:</b> ". $tx); 
    step($cid);
    }
}
if($step == "4" and $menu == "resumer"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Введите уровень знания*\n\nНапример: Среднее, Высшее, Еще учусь",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "💡 <b>Уровень:</b> ". $tx); 
    step($cid);
    }
}
if($step == "5" and $menu == "resumer"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Какие языки вы владеете?*\n\nНапример: Английский, Русский, Турецкий",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📑 <b>Oбразование:</b> ". $tx); 
    step($cid);
    }
}
if($step == "6" and $menu == "resumer"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*В каком формате сможете работать?*\n\nНапример: Онлайн, Только в офисе, Смотря на ситуацию",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📎 <b>Иностранный язык:</b> ". $tx); 
    step($cid);
    }
}
if($step == "7" and $menu == "resumer"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Какая зарплата вас устраивает?*\n\nНапример: 500$+",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "🏦 <b>Форма работы:</b> ". $tx); 
    step($cid);
    }
}
if($step == "8" and $menu == "resumer"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Отправьте портфолио*\n\nНапример: Ссылку",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "💰 <b>Зарплата:</b> ". $tx); 
    step($cid);
    }
}
if($step == "9" and $menu == "resumer"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Введите дополнительные данные*",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]); 
    nextTx($cid, "💼 <b>Портфолио:</b> ". $tx); 
    step($cid);
    }
}
if($step == "10" and $menu == "resumer"){
    bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Введите свой номер для связи с вами*\n\n Например: +998 90 123 45 67",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📝 <b>Дополнительно:</b> ".$tx);
    step($cid);
}
if($step == "11" and $menu == "resumer"){
    if($tx == $otex){}else{
        if(mb_stripos($tx,"998")!==false){
        bot('sendMessage', [
                'chat_id'=>$cid,
                'text'=>"*Данные успешно сохранены*",
                'parse_mode'=>'markdown',
                'reply_markup' => $manzilr,
            ]);
            nextTx($cid, "\n📲 <b>Телефон:</b> ".$tx);
            step($cid);
        }else{
            bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Введите свой номер для связи с вами*\n\nНапример: +998 90 123 45 67",
            'parse_mode' => 'markdown',
            'reply_markup' => $cancel,
        ]);
        }
    }
}
if(isset($data) and $stepe == "12" and $menue == "resumer"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('editMessageText',[
        'chat_id'=>$cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text'=>"<b>Форма готова, вы подтверждаете всю свою информацию?</b>
        $baza",
        'parse_mode'=>'html',
        'reply_markup'=>$tasdiqr,
    ]);
    nextTx($cid, "- ".$data);
    step($cbid);
}

if($data == "ok" and $stepe == "13" and $menue == "resumer"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('sendMessage',[
        'chat_id' => GROUP_CHAT_ID,
        'from_chat_id' => $cid,
        'message_id' => $miid,
        'text'=>"<b>#Xodim</b> $baza\n🙍‍♂️ <b>Telegram:</b> @$cbuser",
        'parse_mode'=>'html',
        ]);
    bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"✅ Ваша форма отправлена менеджеру для проверки. Скоро он будет размещен на канале IT Jobs\nСпасибо за ваше внимание!!!",
        'parse_mode'=>'html',
        'reply_markup'=>$backrr,
    ]);
    del($cbid);
}

// ===================vkr===============================

if ($data == "vkr") {
    if($data == $otexr){}else{
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "*Введите название организации*\n\nНапример: ООО Smart Soft development",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
        pstep($cid,"0");
        put("step/$cbid.menu","rregister");
    }
}
if($step == "0" and $menu == "rregister"){
    if($data == $otexr){}else{
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Какого сотрудника вы ищете?*\n\nНапример: Android разработчик.",
        'parse_mode' => 'markdown',
        'reply_markup' => $otmenr,
    ]);
    nextTx($cid, "\n🏬 <b>Компания:</b> ". $tx); 
    step($cid);
}
}
    if($step == "1" and $menu == "rregister"){
        if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Какие языки программирования должен знать?*\n\nНапример: Java, Kotlin, Android Studio",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
        nextTx($cid, "🗳 <b>Вакансия:</b> ". $tx); 
        step($cid);
    }
}
if($step == "2" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Каким должен быть уровень и опыт?*\n\nНапример: Middle/Senior (Минимум 3-4 года)",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "💻  <b>Технология:</b> ". $tx); 
    step($cid);
    }
}

if($step == "3" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Каким языком должен владеть?*\n\nНапример: Свободное владение Английским и Русским.",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "💡 <b>Уровень:</b> ". $tx); 
    step($cid);
    }
}
if($step == "4" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Знание*\n\nНапример: Высший/Не имеет значения",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📎 <b>Иностранный язык:</b> ". $tx); 
    step($cid);
    }
}
if($step == "5" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Расположение вашего офиса*\n\nНапример: В городе ташкент",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "🎓 <b>Oбразование:</b> ". $tx); 
    step($cid);
    }
}
if($step == "6" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Каким будет режим работы?*\n\nНапример: онлайн или в офисе",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "🏢 <b>Территория:</b> ". $tx); 
    step($cid);
    }
}
if($step == "7" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Вид работы*\n\nНапример: Разовый или постоянный",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📓 <b>Форма работы:</b> ". $tx);
    step($cid);
    }
}
if($step == "8" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*График работы*\n\nНапример: С 8:00 до 17:00",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📅 <b>Тип работы:</b> ".$tx);
    step($cid);
    }
}
if($step == "9" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*В какой промежуток времени может с вами связаться?*\n\nНапример: с 9:00 до 18:00.  ",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "⏳ <b>График работы:</b> ".$tx);
    step($cid);
    }
}

if($step == "10" and $menu == "rregister"){
    if($tx == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Заработная плата*\n\nНапример: - заработная плата договорная от 700$+ ",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
        nextTx($cid, "⏰ <b>Время обращения:</b> ".$tx);
        step($cid);
    }
}
if($step == "11" and $menu == "rregister"){
    if($tx == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Какие основные требования от сотрудника?*\n\nНапример: Должен иметь кейс как минимум от 2-х проектов.",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
        nextTx($cid, "💰 <b>Зарплата:</b> ".$tx);
        step($cid);
    }
}
if($step == "12" and $menu == "rregister"){
    if($tx == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Дополнительные требования*\n\nНапример: Команда должна обладать инициативой, ответственностью, способностью адаптироваться в чужой сфере.",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
        nextTx($cid, "❗️ <b>Требования:</b> ".$tx);
        step($cid);
    }
}
if($step == "13" and $menu == "rregister"){
    if($data == $otexr){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Укажите Имя и фамилию ответственного лица*",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmenr,
        ]);
    nextTx($cid, "📝 <b>Дополнительно</b> ". $tx); 
    step($cid);
    }
}
if($step == "14" and $menu == "rregister"){
    bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Оставьте свой номер для связи с вами*\n\nНапример: +998 90 123 45 67",
            'parse_mode' => 'markdown',
            'reply_markup' => $cancel,
        ]);
    nextTx($cid, "\n👨‍💼 <b>Ответственен:</b> ".$tx);
    step($cid);
}
if($step == "15" and $menu == "rregister"){
    if($tx == $otexr){}else{
        if(mb_stripos($tx,"998")!==false){
        bot('sendMessage', [
                'chat_id'=>$cid,
                'text'=>"*Данные успешно сохранены *",
                'parse_mode'=>'markdown',
                'reply_markup' => $manzilr,
            ]);
            nextTx($cid, "📲 <b>Телефон:</b> ".$tx);
            step($cid);
        }else{
            bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Оставьте свой номер для связи с вами*\n\nНапример: +998 90 123 45 67",
            'parse_mode' => 'markdown',
            'reply_markup' => $cancel,
        ]);
        }
    }
}

if(isset($data) and $stepe == "16" and $menue == "rregister"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('editMessageText',[
        'chat_id'=>$cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text'=>"<b>Форма готова, вы подтверждаете всю свою информацию?</b>
        $baza",
        'parse_mode'=>'html',
        'reply_markup'=>$tasdiqr,
    ]);
    nextTx($cid, "".$data);
    step($cbid);
}
if($data == "ok" and $stepe == "17" and $menue == "rregister"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('sendMessage',[
        'chat_id' => GROUP_CHAT_ID,
        'from_chat_id' => $cid,
        'message_id' => $miid, 
        'text'=>"<b>#Vakansiya</b> $baza\n 🙍‍♂️ <b>Telegram:</b> @$cbuser",//<code>$baza</code>
        'parse_mode'=>'html',
        ]);
    bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"✅ Ваша форма отправлена менеджеру для проверки. Скоро он будет размещен на канале IT Jobs.\nСпасибо за ваше внимание!!!",
        'parse_mode'=>'html',
        'reply_markup'=>$backrr,
    ]);
    del($cbid);
}


// ==================================================================================================================================================================
// ====================================================================================================================================================================
// ====================================================================================================================================================================
// ====================================================================================================================================================================

if ($data=="uz" || $data == "back1" || $data == "orqaga45") {
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "Ishga joylashmoqchi bo'lsangiz Ish topish bo'lmiga kirib maxsus shakldagi formani toldirsiz va jo'natsz agar ish beruvchiga sizning taklif va bilim darajangiz ma'qul bo'lsa o'zlari siz bilan bog'lanishadi\n\nAgar sizga ishchi xodim kerak bolsa  vakansiya bo'limiga kirib o'z taklifingiz qoldirishingiz mumkin",
        'reply_markup' => $vakan
    ]);
}

if ($data=="lang") {
    bot("editMessageText",[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "IT Jobs kanalining rasmiy botiga xush kelibsiz!\n<b>O'zingizga kerakli tilni tanlang</b>",
        'reply_markup' => $lan,
        'parse_mode'=>'html'
    ]);
}

    if ($data == "orqaga1") {
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "Sizga qanday yordam bera olishim mumkin",
            'reply_markup' => $keys
        ]);
    }

    if ($data == "boshmenu") {
        bot('editMessageText',[
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "Sizga qanday yordam bera olishim mumkin?",
            'reply_markup' => $keys
        ]);
    }
// ish topish uchun============================================
if ($data == "resume") {
    $isht = json_encode([
        'inline_keyboard' => [
            [['text' => "📋 Forma to'ldirish",'callback_data' => "shablon"]],
            [['text'=>"🔙 Orqaga",'callback_data' => "orqaga45"]]
        ]
    ]);
    bot('editMessageText', [
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "Ish topish uchun shablon to'ldirishingiz kerak bo'ladi,shablon administratorga muaffaqiyatli yuborilgandan keyin,talabga javob beradigan bo'lsa 24-48 soat oraliqida *IT JOBS* Kanaliga chiqariladi Ish beruvchini sizning bilimlaringiz va talablaringiz qoniqtirsa siz bilan o'zlari bog'lanishadi",
        'parse_mode' => 'markdown',
        'reply_markup' => $isht
    ]);
}
if ($data == "shablon") {
    if($data == $otex){}else{
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "*Ism familyangizni kiriting*\n\nMasalan : Ivanov Ivan ",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
        pstep($cid,"0");
        put("step/$cbid.menu","resume");
    }
}
    if($step == "0" and $menu == "resume"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Yoshingizni kiriting*\n\nMasalan : 23 yosh",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
        ]);
        nextTx($cid, "\n👨‍💻 <b>Ism:</b>". $tx); 
        step($cid);
    }
}
if($step == "1" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Kasbingizni Kiriting*\n\nMasalan : Android developer",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
    ]);
    nextTx($cid, "🕙 <b>Yosh:</b> ". $tx); 
    step($cid);
}
}
if($step == "2" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*O'zingiz biladigan va bemalol foydalana oladigan dasturlash tillari texnologiyalaringizni kiriting*\n\nMasalan : Android Studio, Java, Kotlin",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "📌 <b>Kasbi:</b> ". $tx); 
    step($cid);
    }
}
if($step == "3" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Bilim darajangizni kiriting*\n\nMasalan : Junior,middle,senior",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "💻 <b>Texnologiya:</b> ". $tx); 
    step($cid);
    }
}
if($step == "4" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Malumotingizni kiriting*\n\nMasalan : Oliy,o'rta maxsus,hali o'qiyapman",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "💡 <b>Darajasi:</b> ". $tx); 
    step($cid);
    }
}
if($step == "5" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Qaysi chet tillarini bilasz *\n\nMasalan : Rus,ingliz,turk",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "📑 <b>Malumoti:</b> ". $tx); 
    step($cid);
    }
}
if($step == "6" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Qanday shklda ishlay olasiz*\n\nMasalan : Online, Faqat ofisda, vaziyatga qarab",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "📎 <b>Chet tili:</b> ". $tx); 
    step($cid);
    }
}
if($step == "7" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Sizni qanday maosh qoniqtiradi*\n\nMasalan : 500$+",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "🏦 <b>Ish shakli:</b> ". $tx); 
    step($cid);
    }
}
if($step == "8" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Portfoilongiz manzikini qoldiring*\n\nMasalan : link yoki hali portfolio yo'q",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "💰 <b>Maosh:</b> ". $tx); 
    step($cid);
    }
}
if($step == "9" and $menu == "resume"){
    if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Qoshimcha malumotlaringni kiriting*",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]); 
    nextTx($cid, "💼 <b>Portfolio:</b> ". $tx); 
    step($cid);
    }
}
if($step == "10" and $menu == "resume"){
    bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Siz bilan Bog'lanishlari uchun quyidagi ko'rinishda nomeringizni qolding*\n\nMasalan : +99890 123 45 67",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
    nextTx($cid, "📝 <b>Qo'shimcha:</b> ".$tx);
    step($cid);
}
if($step == "11" and $menu == "resume"){
    if($tx == $otex){}else{
        if(mb_stripos($tx,"998")!==false){
        bot('sendMessage', [
                'chat_id'=>$cid,
                'text'=>"*Ma'lumotlar muvaffaqiyatli saqlandi*",
                'parse_mode'=>'markdown',
                'reply_markup' => $manzil,
            ]);
            nextTx($cid, "\n📲 <b>Telefon:</b> ".$tx);
            step($cid);
        }else{
            bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Telefon raqamingizni kiriting?*\n\nMasalan : +99890 123 45 67",
            'parse_mode' => 'markdown',
            'reply_markup' => $cancel,
        ]);
        }
    }
}
if(isset($data) and $stepe == "12" and $menue == "resume"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('editMessageText',[
        'chat_id'=>$cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text'=>"<b>Sizning Anketa tayyor bo'ldi, barchasi ma'lumotlaringiz tasdiqlaysizmi?</b>
        $baza\n☑️ Rating : $data",
        'parse_mode'=>'html',
        'reply_markup'=>$tasdiq,
    ]);
    nextTx($cid, "- ".$data);
    step($cbid);
}

if($data == "ok" and $stepe == "13" and $menue == "resume"){
    ACL($ida);
    $baza = file_get_contents("step/$cbid.txt");
    bot('sendMessage',[
        'chat_id' => GROUP_CHAT_ID,
        'from_chat_id' => $cid,
        'message_id' => $miid,
        'text'=>"<b>#Xodim</b> $baza\n🙍‍♂️ <b>Telegram:</b> @$cbuser",
        'parse_mode'=>'html',
        ]);
    bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"✅ Sizning Anketangiz xodimlarimizga muvaffaqiyatli jo'natildi, qisqa fursatlarda sizga aloqaga chiqamiz! E'tiboringiz uchun rahmat",
        'parse_mode'=>'html',
        'reply_markup'=>$back1,
    ]);
    del($cbid);
}
    // vakansiya uchun
    if ($data == "vk") {
        if($data == $otex){}else{
            bot('editMessageText', [
                'chat_id' => $cbid,
                'message_id' => $mid,
                'inline_message_id' => $mmid,
                'text' => "*Idora Tashkilot Nomini kiriting*\n\nMasalan : OOO Smart Soft development",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
            pstep($cid,"0");
            put("step/$cbid.menu","register");
        }
    }
    if($step == "0" and $menu == "register"){
        if($data == $otex){}else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Sizga qanday ishchi xodim kerak*\n\nMasalan : Android developer",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
        nextTx($cid, "\n🏬 <b>Idora:</b> ". $tx); 
        step($cid);
    }
}
        if($step == "1" and $menu == "register"){
            if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Bilishi kerak bo'lgan dasturlash tillari va texnologiyalari?*\n\nMasalan : Java, Kotlin, Android Studio",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
            nextTx($cid, "🗳 <b>Vakansiya:</b> ". $tx); 
            step($cid);
        }
    }
    if($step == "2" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Xodimning Darajasi va Tajribasi qanday bolishi kerak*\n\nMasalan : Middle/Senior\nKamida 3-4 yillik tajriba",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "💻  <b>Texnologiya:</b> ". $tx); 
        step($cid);
        }
    }
    
    if($step == "3" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Qaysi Chet tillarni bilish talab qilinadi*\n\nMasalan : Rus, ingliz tillarida erkin gapira olishi kerak",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "💡 <b>Darajasi:</b> ". $tx); 
        step($cid);
        }
    }
    if($step == "4" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Malumoti*\n\nMasalan : Oliy, Ahamiyatsiz ",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "📎 <b>Chet tili:</b> ". $tx); 
        step($cid);
        }
    }
    if($step == "5" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Ofis joylashgan hududni yozing*",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "🎓 <b>Malumoti:</b> ". $tx); 
        step($cid);
        }
    }
    if($step == "6" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Ish qanday shaklda bo'ladi*\n\nMasalan: online yoki Ofisda",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "🏢 <b>Hudud:</b> ". $tx); 
        step($cid);
        }
    }
    if($step == "7" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Ish turi*\n\nMasalan: Doimiy ish, 1 martalik ish",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "📓 <b>ish Shakli:</b> ". $tx);
        step($cid);
        }
    }
    if($step == "8" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Ish grafigi*\n\nMasalan :  haftada 5 kun с 9:00 до 18:00  ",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "📅 <b>Ish Turi:</b> ".$tx);
        step($cid);
        }
    }
    if($step == "9" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Qaysi vaqt orqalig'ida siz bilan bog'lanishsin*\n\nMasalan :  с 9:00 до 18:00  ",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "⏳ <b>Ish vaqti:</b> ".$tx);
        step($cid);
        }
    }

    if($step == "10" and $menu == "register"){
        if($tx == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Narxi*\n\nMasalan : - заработная плата договорная от 700$+ ",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
            nextTx($cid, "⏰ <b>Murojaat vaqti:</b> ".$tx);
            step($cid);
        }
    }
    if($step == "11" and $menu == "register"){
        if($tx == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Xodimdan asosan nimalar talab qilinadi*\n\nMasalan : Kamida realni 2ta proektda qatnashgan bo'lishi shart",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
            nextTx($cid, "💰 <b>Maosh:</b> ".$tx);
            step($cid);
        }
    }
    if($step == "12" and $menu == "register"){
        if($tx == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Ish haqida Qo'shimchalar*\n\nMasalan : Jamoaga kirishuvchanlik, masulyatlilik, boshqani kodiga moslasha olish qobilyati bolishi shart",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
            nextTx($cid, "❗️ <b>Talablar:</b> ".$tx);
            step($cid);
        }
    }
    if($step == "13" and $menu == "register"){
        if($data == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Vakansiyaga Masul shahsning ism familyasini kiriting*",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "📝 <b>Qo'shimcha:</b> ". $tx); 
        step($cid);
        }
    }
    if($step == "14" and $menu == "register"){
        bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Siz bilan Bog'lanishlari uchun quyidagi ko'rinishda nomeringizni qolding*\n\nMasalan : +99890 123 45 67",
                'parse_mode' => 'markdown',
                'reply_markup' => $cancel,
            ]);
        nextTx($cid, "\n👨‍💼 <b>Masul:</b> ".$tx);
        step($cid);
    }
    if($step == "15" and $menu == "register"){
        if($tx == $otex){}else{
            if(mb_stripos($tx,"998")!==false){
            bot('sendMessage', [
                    'chat_id'=>$cid,
                    'text'=>"*Ma'lumotlar muvaffaqiyatli saqlandi*",
                    'parse_mode'=>'markdown',
                    'reply_markup' => $manzil,
                ]);
                nextTx($cid, "📲 <b>Tel nomer:</b> ".$tx);
                step($cid);
            }else{
                bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Telefon raqamingizni kiriting?*\n\nMasalan : +99890 123 45 67",
                'parse_mode' => 'markdown',
                'reply_markup' => $cancel,
            ]);
            }
        }
    }

    if(isset($data) and $stepe == "16" and $menue == "register"){
        ACL($ida);
        $baza = file_get_contents("step/$cbid.txt");
        bot('editMessageText',[
            'chat_id'=>$cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text'=>"<b>Sizning Anketa tayyor bo'ldi, barchasi ma'lumotlaringiz tasdiqlaysizmi?</b>
            $baza\n☑️ Rating : $data",
            'parse_mode'=>'html',
            'reply_markup'=>$tasdiq,
        ]);
        nextTx($cid, "".$data);
        step($cbid);
    }
    if($data == "ok" and $stepe == "17" and $menue == "register"){
        ACL($ida);
        $baza = file_get_contents("step/$cbid.txt");
        bot('sendMessage',[
            'chat_id' => GROUP_CHAT_ID,
            'from_chat_id' => $cid,
            'message_id' => $miid, 
            'text'=>"<b>#Vakansiya</b> $baza\n 🙍‍♂️ <b>Telegram:</b> @$cbuser",//<code>$baza</code>
            'parse_mode'=>'html',
            ]);
        bot('sendMessage',[
            'chat_id'=>$cbid,
            'text'=>"✅ Sizning Anketangiz xodimlarimizga muvaffaqiyatli jo'natildi, qisqa fursatlarda sizga aloqaga chiqamiz! E'tiboringiz uchun rahmat",
            'parse_mode'=>'html',
            'reply_markup'=>$back1,
        ]);
        del($cbid);
    }
// ====================uzbek======================
    if($data == "clear"){
        ACL($ida);
        del($cbid);
        del($cid);
        if(isset($tx)) $url = "$cid";
        if(isset($data)) $url = "$cbid";
        bot('editMessageText', [
        'chat_id'=>$url,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text'=>"Anketa bekor qilindi!",
        'reply_markup'=>$back1
        ]);
    }
    if($data == "otex"){
        ACL($ida);
        del($cbid);
        del($cid);
        if(isset($tx)) $url = "$cid";
        if(isset($data)) $url = "$cbid";
        bot('editMessageText', [
        'chat_id'=>$url,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text'=>"vakansiya bekor qilindi!",
        'text' => "Ishga joylashmoqchi bo'lsangiz oz rezyume yoki portfoliongizni rezyume bolimiga kirib qoldirishingiz mumkin\n\nAgar sizga ishchi xodim kerak bolsa  vakansiya bo'limiga kirib oz taklifingiz qoldirishingiz mumkin",
        'reply_markup'=>$vakan,
        ]);
    }
// =======================rus=============================
if($data == "clearr"){
    ACL($ida);
    del($cbid);
    del($cid);
    if(isset($tx)) $url = "$cid";
    if(isset($data)) $url = "$cbid";
    bot('editMessageText', [
    'chat_id'=>$url,
    'message_id' => $mid,
    'inline_message_id' => $mmid,
    'text'=>"Форма была отменена!!!",
    'reply_markup'=>$backrr
    ]);
}


if($data == "otexr"){
        ACL($ida);
        del($cbid);
        del($cid);
        if(isset($tx)) $url = "$cid";
        if(isset($data)) $url = "$cbid";
        bot('editMessageText', [
        'chat_id'=>$url,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "Если вы подаете заявление о приеме на работу, вы можете оставить свое резюме или портфолио в разделе «Найти работу».\n\nЕсли вам нужен разработчик, вы можете оставить свое предложение, выбрав раздел «Отправить вакансию».",
        'reply_markup'=>$vakanr,
        ]);
    }
// =======================eng=============================
if($data == "cleare"){
    ACL($ida);
    del($cbid);
    del($cid);
    if(isset($tx)) $url = "$cid";
    if(isset($data)) $url = "$cbid";
    bot('editMessageText', [
    'chat_id'=>$url,
    'message_id' => $mid,
    'inline_message_id' => $mmid,
    'text'=>"The form has been canceled!!!",
    'reply_markup'=>$backe
    ]);
}


if($data == "otexe"){
        ACL($ida);
        del($cbid);
        del($cid);
        if(isset($tx)) $url = "$cid";
        if(isset($data)) $url = "$cbid";
        bot('editMessageText', [
        'chat_id'=>$url,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "If you want to get a job, you can send your resume or fill in the form.\n\nIf you need a developer, you can go to the vacancy section and fill in the form",
        'reply_markup'=>$vakane,
        ]);
    }
?>
