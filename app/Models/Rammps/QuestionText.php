<?php

namespace App\Models\Rammps;

trait QuestionText {

	public static function questionText(){

		return [
			's_1_consent'=>'আপনি কি কথা বলার জন্য এখন সময় দেবেন? আমি কি প্রশ্ন শুরু করব?',
			's_1_consent_n'=>'অসম্মতির কারণ',
			's_1_gender'=>'আপনি পুরুষ না মহিলা?',
			's_1_18up'=>'আমরা ১৮ বছর বা তার বেশী বয়সের ব্যক্তির সাক্ষাৎকার নিচ্ছি। 
আপনার বয়স কি ১৮ বছর বা তার উপরে?
',
's_1_age'=>'আপনার বয়স কত?',
's_1_dd'=>'আপনি বর্তমানে কোন্ জেলায় বাস করেন?',
's_1_v_or_c'=>'আপনি শহরে না গ্রামে বাস করেন? ',
's_1_cc_uz_mc'=>'দয়া করে আপনি বর্তমানে যেই সিটি করপোরেশন/পৌরসভা/থানা বা উপজেলায় থাকেন তার নামটি বলুন।',

's_2_name'=>'দয়া করে আপনার নামটি বলুন।',
's_2_education'=>'আপনি সর্বোচ্চ কতদূর পর্যন্ত পড়াশুনা করেছেন? ',
's_2_marial_status'=>'আপনার বর্তমান বৈবাহিক অবস্থা জানাবেন কি?',
's_2_occupation'=>'আপনার পেশা কি? (আপনি কি কাজ করেন?)',

's_3_khana'=>'বর্তমানে আপনার খানায় বর্তমানে মোট কয়জন বাস করেন? (একই খানায় ঘুমান এবং এক পাতিলের রান্না খান)',
's_3_relation_w_main'=>'পরিবারের প্রধানের সাথে আপনার সম্পর্ক কী ?',
's_3_khana_u_5'=>'খানায় ৫ বছরের কম বয়সী শিশুদের সংখ্যা কত ?',
's_3_until_2018'=>'২০১৮ সালের জানুয়ারী থেকে এখন পর্যন্ত আপনার খানার (পরিবারের) কোন সদস্য মারা গিয়েছেন কী?',
's_3_until_2018_a'=>'হ্যাঁ হলে, কয়জন মারা গেছেন?',

's_4_mother_a_or_d'=>'আপনার জন্মদাতা মাতা বর্তমানে জীবিত আছেন কি?',
's_4_mother_age'=>'উনার বয়স কত?',
's_4_mother_location'=>'তিনি কোথায় থাকেন? তিনি কি আপনার খানায় থাকেন, নাকি একই জেলার একই গ্রামে/শহরে, অথবা অন্য জেলায় থাকেন?',
's_4_mother_name'=>'দয়া করে মায়ের নামটি বলুন।',
's_4_mother_d_age'=>'তিনি কত বছর বয়সে মারা গেছেন?',
's_4_mother_d_year'=>'তিনি কোন বছরে মারা গেছেন?',
's_4_mother_db_location'=>'মৃত্যুর আগে তিনি কি আপনার খানায় ছিলেন, নাকি একই জেলার একই গ্রামে/শহরে, অথবা অন্য জেলায় বাস করতেন?',


's_4_father_a_or_d'=>'আপনার জন্মদাতা মাতা বর্তমানে জীবিত আছেন কি?',
's_4_father_age'=>'উনার বয়স কত?',
's_4_father_location'=>'তিনি কোথায় থাকেন? তিনি কি আপনার খানায় থাকেন, নাকি একই জেলার একই গ্রামে/শহরে, অথবা অন্য জেলায় থাকেন?',
's_4_father_name'=>'দয়া করে মায়ের নামটি বলুন।',
's_4_father_d_age'=>'তিনি কত বছর বয়সে মারা গেছেন?',
's_4_father_d_year'=>'তিনি কোন বছরে মারা গেছেন?',
's_4_father_db_location'=>'মৃত্যুর আগে তিনি কি আপনার খানায় ছিলেন, নাকি একই জেলার একই গ্রামে/শহরে, অথবা অন্য জেলায় বাস করতেন?',


's_6_vac_possible'=>'যদি আপনাকে কোভিড ১৯ এর বিরুদ্ধে বিনামূল্যে একটি ভ্যাকসিন দিতে চাওয়া হয়, তাহলে আপনার টিকাটি গ্রহণ করার সম্ভাবনা কতটা ?',
's_6_vac_taken'=>'আপনি কি কখনও কোভিড-১৯ এর কোন টিকার ডোজ নিয়েছেন?',
's_6_vac_number'=>'আপনি কয় ডোজ নিয়েছেন?',
's_6_vac_which'=>'আপনি কোভিড-১৯ প্রতিরোধে কোন্ টিকা-টি নিয়েছেন?',
's_6_vac_suggested'=>'আপনি কার পরামর্শে টিকা নিয়েছেন।',
's_6_vac_ignorance_reason'=>'প্রধানত কি কারণে আপনি ভ্যাকসিন নিতে চন না ?',

			//death questions
			'covid_death_name'=>'যারা মারা গেছেন তাদের নামগুলো দয়া করে ক্রমানুসারে বলুণ (সাম্প্রতিক মৃত্যু থেকে ২০১৮ সালের জানুয়ারী পর্যন্ত সকলের)ঃ',
			'covid_death_relation'=>'আপনার (উত্তরদাতার) সাথে মৃত ব্যক্তির কি সম্পর্ক ছিল? ',


		];

	}

	public static function placeHolderText(){
		return [
			's_3_khana_m'=>'পুরুষ',
			's_3_khana_f'=>'মহিলা',
			'any_others'=>'অন্যান্য (উল্লেখ করুন ----)',
			'add_more'=>'add বাটন এর মাধ্যমে , যত জন লাগবে নিয়ে নিন ।',
			'death_name'=>'মৃত ব্যক্তির নাম ',
			'relation_with'=>'আপনার (উত্তরদাতার) সাথে মৃত ব্যক্তির কি সম্পর্ক ছিল? ',
			'death_time'=>'কতদিন আগে মারা গেছেন?',
			'death_gender'=>'তিনি কি পুরুষ না মহিলা?',
			'death_year'=>'কোন্ বছরে মারা গেছেন?',
			'dyear'=>'বছর',
			'dmonth'=>'মাস',
			'dday'=>'দিন',
			'death_married'=>'তিনি কি বিবাহ করেছিলেন?',
			'death_pregnant'=>'বিবাহিত মহিলা হলে; তিনি যখন মারা যান তখন কী গর্ভবতী ছিলেন ?',
			'death_on_birth'=>'বিবাহিত মহিলা হলে; উনি কী প্রসবের সময় মারা গিয়েছিলেন ?',
			'death_2m_birth'=>'বিবাহিত মহিলা হলে; উনি কী গর্ভাবস্থা শেষ হওয়ার বা সন্তান প্রসবের ২ মাসের মধ্যে মারা গিয়েছিলেন ?',
			'death_symptoms'=>'কি আগে থেকেই অন্য কোন স্বাস্থ্য সমস্যায় ভুগছিলেন যা তার মৃত্যুর কারণ হতে পারে?',
			'death_location'=>'তিনি কোথায় মারা গেছেন?',
			'death_reason'=>'কি কারণে বা অসুখে মারা গিয়েছিলেন?',

			'death_detect_by'=>'মৃত (নাম)-কে কোন স্বাস্থ্য কর্মী কোভিড ১৯ রোগী হিসাবে শনাক্ত করেছিলেন কি?',			
			'death_covid_symptoms'=>'মৃত্যুর আগে (নাম) কি কি অসুবিধায় বা উপসর্গে ভ’গেছিলেন?<br/>
তিনি কি ঠান্ডা জনিত বা ইন্ফ্লুয়েঞ্জার মত অথবা শ^াসতন্ত্র সংশ্লিষ্ট কোন অসুবিধা বা উপসর্গে ভ’গেছিলেন?',
			'death_covid_hospital'=>'মৃত্যুর দুই সপ্তাহের মধে (নাম) কি কোন হাসপাতালে গিয়েছিলেন?',
			'death_covid_hospital_a'=>'মৃত্যুর দুই সপ্তাহের মধ্যে (নাম) কি কোন হাসপাতালে ভর্তি হয়েছিলেন?',
			'death_covid_death_where'=>'(নাম) তিনি কোথায় মারা গেছেন?',
			'death_covid_grave'=>'(নাম) -কে কোথায় কবর দেয়া হয়েছে?',
			




		];
	}


	public static function initialText(){

		return [

			'i_1'=>'<strong>হ্যালো, </strong><br/>
<strong>আসসালামুয়ালাইকুম,</strong><br/>
আমি বাংলাদেশ সরকারের স্বাস্থ্য মন্ত্রণালয়ের অধীনে একটি প্রতিষ্ঠান আইইডিসিআর থেকে বলছি। আমরা মোবাইল ফোনের মাধ্যমে আপনার এবং পরিবাররে সদস্যদের স্বাস্থ্য বিষয়ক তথ্য, মৃত্যু, মৃত্যুর কারণ ইত্যাদি জানতে একটি জরিপ করছি। এই জরিপের প্রশ্নোত্তরগুলো শেষ করতে প্রায় ২০ মিনিটের মতো সময় লাগবে। এই কলটি ধরলে আপনার কোনো টাকা কাটা যাবে না। এই জরিপে অংশগ্রহণ সম্পূর্ণ আপনার ইচ্ছাধীন; এতে আপনার ব্যক্তিগত কোন লাভ বা ক্ষতি নেই। আাপনার অস্বস্তি হলে কোন প্রশ্নের উত্তর নাও দিতে পারেন, আর ভাল না লাগলে যে কোন সময় কথা বলা বন্ধ করে দিতে পারেন। আপনার এবং অন্যদের দেয়া তথ্য থেকে নাম ও অন্যান্য পরিচিতি সরিয়ে আপনাদের দেয়া তথ্যের গোপনিয়তা রক্ষা করা হবে, এবং সকলের দেয়া তথ্যাদি আমাদের দেশের মানুষের স¦াস্থ্য সম্পর্কে বিশদভাবে বুঝতে এবং স্বাস্থ্য ব্যবস্থার উন্নয়ণে ব্যবহার করা হবে।  আমি অনুরোধ করব আপনি আমাদের সাথে থাকবেন এবং পুরো জরিপটি শেষ করবেন। ',


		's_1'=>'সূচনা, সম্মতি ও সাক্ষাৎকারের সময় নির্ধারণ',
		's_2'=>'বাছাইমূলক প্রশ্নঃ আপনি এই জরিপটিতে অংশগ্রহণ করতে পারবেন কিনা তা জানার জন্য এখন আমি কিছু প্রশ্ন করবো।',
		's_3'=>'খানাসংশ্লিষ্ট সদস্যদের তথ্যঃ এখন আমি আপনাকে আপনার পরিবারের সদস্যদের সম্পর্কে কিছু প্রশ্ন করতে চাই।',
		'covid_death_intial'=>'জানুয়ারী ২০১৮ থেকে সদস্যদের মৃত্যুর তথ্যঃ এখন, আমি ২০১৮ সালের জানুয়ারী মাস থেকে এখন পর্যন্ত খানার/পরিবারের যে সদস্যগণ মারা গিয়াছেন তাদের তথ্য জানতে চাইবো (দয়া করে প্রথমে সাম্প্রতিক মৃত্যুর তথ্য দিয়ে শুরু করুন)।',
		's_4'=>'এখন আমি আপনার জন্মদাতা পিতা-মাতা সম্পর্কে কিছু তথ্যাদি জানতে প্রশ্ন করব',
		's_6'=>'কোভিড -১৯ ভ্যাকসিন হেসিট্যান্সিঃ এখন আমি আপনাকে কোভিড- ১৯ টিকা সম্পর্কে প্রশ্ন করতে চাই',

		'covid_19_question'=>'গত প্রায় দুই বছর ধরে করোনা ভাইরাস বা কোভিড-১৯ রোগ বাংলাদেশ সহ বিশ^জুড়ে মহামারি হিসেবে ছড়িয়ে পড়েছে। এখন আমি আপনার উল্লেখ করা জানুয়ারী ২০২০ এর পরের প্রতিটি মৃত্যু করোনা ভাইরাস (কোভিড- ১৯) এর কারণে হয়েছে কিনা তা যাঁচাই করতে চাইঃ',

		'covid_19_mf_question'=>'গত প্রায় দুই বছর ধরে করোনা ভাইরাস বা কোভিড-১৯ রোগ বাংলাদেশ সহ বিশ^জুড়ে মহামারি হিসেবে ছড়িয়ে পড়েছে। এখন আমি আপনার উল্লেখ করা জানুয়ারী ২০২০ এর পরে আপনার বাবা, বা মায়ের মৃত্যু করোনা ভাইরাস (কোভিড- ১৯) এর কারণে হয়েছে কিনা তা যাঁচাই করতে চাইঃ',

		'covid_19_mother'=>'মাতা',
		'covid_19_father'=>'পিতা',
		'covid_19_mother_c'=>'মাতা কোভিড- ১৯',
		'covid_19_father_c'=>'পিতা কোভিড- ১৯',
		];
	}
}