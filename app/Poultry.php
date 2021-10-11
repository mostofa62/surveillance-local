<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Poultry extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function schedule_desc()
    {
        return $this->hasOne('App\Schedule', 'poultry_id','id')->orderBy('id', 'desc');
    }

    public static function getPersonalMood(){
        return[ 'en'=>[1=>'Excellent', 2=>'Very Good', 3=>'Good', 4=>'Fair', 5=>'Poor', 99=>'Refuse'],
            'bn'=>[1=>'চমৎকার', 2=>'খুব ভাল', 3=>'ভাল', 4=>'মোটামুটি', 5=>'খারাপ', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getPersonAge(){
        $ages['en']=[];
        $ages['bn']=[];
        for ($i=5;$i<=90; $i++){
            $ages['en'][$i]=$i;
            $ages['bn'][$i]=$i;
        }
        $ages['en'][99]="Refuse";
        $ages['bn'][99]="উত্তর দিতে অসম্মত";

        return $ages[session('language')];//[ 1=>'Excellent', 2=>'Very Good', 3=>'Good', 4=>'Fair', 5=>'Poor', 99=>'Refuse'];
    }
    public static function getYesNo(){
        return [ 'en'=>[ 1=>'Yes', 0=>'No', 99=>'Refuse'],
            'bn'=>[ 1=>'হ্যাঁ', 0=>'না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getGender(){
        return [ 'en'=>[ 1=>'Man', 2=>'Woman', 3=>'Third Gender', 77=>'Other', 99=>'Refuse'],
            'bn'=>[ 1=>'পুরুষ', 2=>'নারী', 3=>'তৃতীয় লিঙ্গ', 77=>'অন্যান্য', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getOtherDontKnow(){
        return [ 'en'=>[ 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getDontKnow(){
        return ['en'=>[ 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getYesNoDontKnow(){
        return ['en'=>[ 1=>'Yes', 0=>'No', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'হ্যাঁ', 0=>'না', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getVistingTime(){
        return ['en'=>[ 1=>'Daily', 2=>'3-5 Times/Week', 3=>'1-2 Times/Week', 4=>'1-3 Times/Month', 5=>'6-11 Times/Year', 6=>'3-5 Times/Year', 7=>'1-2 Times/Year', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'দৈনিক', 2=>'সপ্তাহে ৩-৫ বার', 3=>'সপ্তাহে ১-২ বার', 4=>'মাসে ১-৩ বার', 5=>'বছরে ৬-১১ বার', 6=>'বছরে ৩-৫ বার', 7=>'বছরে ১-২ বার', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getCumulativeAge(){
        return ['en'=>[1=>'0-4 Years', 2=>'5-14 Years', 3=>'15-24 Years', 4=>'25-34 Years', 5=>'35-44 Years', 6=>'45-54 Years', 7=>'55-64 Years', 8=>'65 or above', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[1=>'০-৪ বছর', 2=>'৫-১৪ বছর', 3=>'১৫-২৪ বছর', 4=>'২৫-৩৪ বছর', 5=>'৩৫-৪৪ বছর', 6=>'৪৫-৫৪ বছর', 7=>'৫৫-৬৪ বছর', 8=>'৬৫ বছর বা তার উপরে', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getPurchasePoultry(){
        return ['en'=>[1=>'Daily', 2=>'At least 1/Week', 3=>'About 1-2/Month', 4=>'About 1-2/Year', 5=>'Never', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[1=>'দৈনিক', 2=>'সপ্তাহে অন্ততঃ ১ বার', 3=>'মাসে প্রায় ১-২ বার', 4=>'বছরে প্রায় ১-২ বার', 5=>'একবারও না', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getHowOftenDoThat(){
        return ['en'=>[ 1=>'Always', 2=>'Usually', 3=>'Rearly', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'সব সময়', 2=>'মাঝে মধ্যে', 3=>'কদাচিৎ', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getSlaughterPlace(){
        return ['en'=>[ 1=>'Market', 2=>'Home', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'বাজার', 2=>'বাড়ি', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getSlaughterAreaInMarket(){
        return ['en'=>[ 1=>'Stall', 2=>'Slaughter Area', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'দোকান', 2=>'জবাইখানা', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getAcquiredPoultry(){
        return ['en'=>[ 1=>'Mobile Vendor', 2=>'Backyard Poultry', 3=>'Don\'t Acquire', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'ভ্রাম্যমাণ বিক্রেতা', 2=>'নিজের বাড়ির উঠানে পালিত মুরগি', 3=>'সংগ্রহ করেনি', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getDefeatheringPoultry(){
        return ['en'=>[ 1=>'Hand', 2=>'Machine', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'হাতে', 2=>'মেশিনে', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getDefeatheringPoultryAtStall(){
        return ['en'=>[ 1=>'By hand, with poultry not boiled/scalded before', 2=>'By hand, with poultry boiled/scalded before', 3=>'Uncovered machine, with poultry not boiled/scalded before', 4=>'Uncovered machine, with poultry boiled/scalded before', 5=>'Covered machine, with poultry boiled/scalded before', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'খালি হাতে, হাঁস/মুরগি সেদ্ধ না করে বা গরম পানিতে না ভিজিয়ে', 2=>'খালি হাতে, হাঁস/মুরগি সেদ্ধ করে বা গরম পানিতে ভিজিয়ে', 3=>'খোলা মেশিনে, হাঁস/মুরগি সেদ্ধ না করে বা গরম পানিতে না ভিজিয়ে', 4=>'খোলা মেশিনে, হাঁস/মুরগি সেদ্ধ করে বা গরম পানিতে ভিজিয়ে', 5=>'বদ্ধ মেশিনে, হাঁস/মুরগি সেদ্ধ করে বা গরম পানিতে ভিজিয়ে', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }

    public static function getFeverMeasure(){
        return ['en'=>[ 1=>'Yes', 0=>'No', 2=>'Didn’t measure', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[ 1=>'হ্যাঁ', 0=>'না', 2=>'পরিমাপ করা হয়নি', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }

    public static function getMedicalCareType(){
        return ['en'=>[1=>'Hospital', 2=>'Community Clinic', 3=>'Pharmacy', 4=>'MBBS Doctor', 5=>'Village Doctor/Homeopath', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[1=>'হাসপাতাল', 2=>'কমিউনিটি ক্লিনিক', 3=>'ফার্মেসি', 4=>'এম.বি.বি.এস ডাক্তার', 5=>'গ্রাম্যডাক্তার/হোমিও ডাক্তার', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getMaritalStatus(){
        return ['en'=>[1=>'Single', 2=>'Married', 3=>'Divorced/Separated', 4=>'Widowed/Widower', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[1=>'অবিবাহিত', 2=>'বিবাহিত', 3=>'তালাকপ্রাপ্ত / পৃথক বসবাস করেন', 4=>'বিধবা / বিপত্নীক', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getPrimaryOccupation(){
        return['en'=>[1=>'Student', 2=>'Home Maker', 3=>'Government service', 4=>'Private service', 5=>'Business Service', 6=>'Garment worker', 7=>'Teacher', 8=>'Doctor', 9=>'Engineer', 10=>'Lawyer', 11=>'Army/Navy/Air', 12=>'Tailor', 13=>'Public Representative', 14=>'Journalist', 15=>'Imam/priest/pope', 16=>'Domestic Helper', 17=>'Agriculture', 18=>'Fisherman', 19=>'Poultry market worker', 20=>'Daily Labourer', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=> [1=>'ছাত্র', 2=>'গৃহিণী', 3=>'সরকারি চাকরি', 4=>'বেসরকারি চাকরি', 5=>'ব্যবসা', 6=>'গার্মেন্ট কর্মী', 7=>'শিক্ষক', 8=>'ডাক্তার', 9=>'ইঞ্জিনিয়ার', 10=>'আইনজীবী', 11=>'সেনা/বিমান/নৌ-বাহিনীর সদস্য', 12=>'দর্জি', 13=>'জন প্রতিনিধি', 14=>'সাংবাদিক', 15=>'ইমাম / যাজক / পোপ', 16=>'বাড়ির কাজের লোক', 17=>'কৃষক', 18=>'জেলে', 19=>'হাঁসমুরগির বাজারের কর্মী', 20=>'দিনমজুর', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }
    public static function getEducationalBackground(){
        return ['en'=>[0=>'Illiterate',1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10',11=>'11',12=>'12', 44=> 'SSC', 55=> 'HSC', 66=> 'Degree', 22=> 'Informal Education', 77=>'Other', 88=>'Don\'t Know', 99=>'Refuse'],
            'bn'=>[0=>'নিরক্ষর',1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10',11=>'11',12=>'12', 44=> 'এস এস সি', 55=> 'এইচ এস সি', 66=> 'ডিগ্রী', 22=> 'অপ্রাতিষ্ঠানিক শিক্ষা', 77=>'অন্যান্য', 88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }

    public static function getScheduleSuveillance(){
        return ['en'=>[0=>'The interview is incomplete and today or the next working day has been rescheduled', 3=>'The interview is incomplete and did not reschedule'],
            'bn'=>[0=>'সাক্ষাৎকার অসম্পূর্ণ ও আজই বা পরবর্তী কর্মদিবসে রিশিডিউল করা হয়েছে', 3=>'সাক্ষাৎকার অসম্পূর্ণ ও আজই বা পরবর্তি কর্মদিবসে রিশিডিউল করা হয়নি']][session('language')];
    }
    public static function getCallStatus(){
        return ['en'=>[ 3=>'Called but did not respond', 2=>'Not in Active', 4=>'Switch off'],
            'bn'=>[ 3=>'কল হয়েছে,কিন্তু ধরেন নাই', 2=>'সক্রিয় না', 4=>'মোবাইল বন্ধ']][session('language')];
    }

    //Poultry Question data
    public static function questionText(){
        return [
            'en'=>[
            '0.0.0.i'=>'Thank you, you are eligible. This survey includes questions regarding your history of live poultry market visits and food preparation practices. May i continue?',
            '0.0.1.i'=>'I would first like to ask you some general questions about where you live in Dhaka City Corporation',
            '0.0.2.i'=>'Now, I would like to discuss your usual poultry purchasing practices. By poultry we are referring to chickens, ducks, geese, etc. And by live poultry market (kacha bazaar) we are referring to places where poultry are available alive and can include wholesale, retail, and mixed markets.',
            '0.0.3.i'=>'Now, I would like to ask you a few questions about your poultry food preparation practices.',
            '0.0.4.i'=>'Now, I would like to ask you a few questions about your use of personal protective equipment during poultry handling.',
            '0.0.5.i'=>'Now, I would like to ask you a few questions about your health.',
            '0.0.6.i'=>'I have a few final questions to ask you about yourself and your household.',
            '0'=>'<strong>Assalamualaikum!</strong> </br>Dear Sir/Madam, I am calling from Institute of Epidemiology, Disease Control & Research a Government institute under the Ministry of Health and Family Welfare of the People’s Republic of Bangladesh. We are conducting a short health related survey, for which we would like to interview you. The survey should take about 10 minutes and the information gathered will help us prevent the spread of infectious diseases. Participation is voluntary and you may stop at any time. The answers you provide will be kept absolutely confidential. Do you have enough time for such discussion? Should we start?<ul><li>If the respondent agrees then start with thanking him/ her and go to SC1 (Screening Questions)</li><li>If the respondent disagree then encourage to discuss, if they still do not agreed, deliver closing remarks and end call</li><li>If the respondent agrees to attend the interview later, take his/ her appointment for the interview (Fixing Appointment)</li></ul>',
            '0_'=>"Fixing Appointment",
            '0_0'=>"When is convenient to call you for the interview?",

            's'=>'SQ & SC',
            's_0_1'=>"How are you today?",
            's_0_2'=>"How old are you?",
            's_0_2_i'=>"We are interviewing people 18 years of age and above. If the respondent is less than 18 years of age, inform them that they are not eligible. Thank them for their time, and end call.</br>If the respondent is 18 or above, write down the age in completed years. I.e. if the age is 25 years 11 month then write down 25 years. If necessary ask relevant questions.",
            's_0_3'=>"Do you currently live in Dhaka City Corporation?",
            's_0_3_i'=>"Inform them that they are not eligible. Thank them for their time, and end call.",
            's_0_4'=>"Have you lived here for at least the last year?",
            's_0_4_i'=>"Inform them that they are not eligible. Thank them for their time, and end call.<br>Note: If respondent has travelled out of DCC in the last year but considers their residence DCC they should still be recruited.",
            'sc_0_1'=>"Do you consent to participate In this survey?",
            'sc_0_1_i'=>"Thank them for their time, and end call.",

            'gi_1'=>'Section 1: GI',
            'gi_1_1'=>"Try to assess the gender of the respondent <br/> If needed: What is your gender?",
            'gi_1_1_i'=>"please avoid asking directly",
            'gi_1_2_a'=>"What thana do you live in?",
            'gi_1_2_a_i'=>"Record name of Thana in DCC. If necessary ask relevant questions. If other please record value in text box. ",
            'gi_1_2_b'=>"What area do you live in?",
            'gi_1_2_b_i'=>"Record name of ward in DCC. If necessary ask relevant questions. If other please record value in text box. ",

            'pp_2'=>'Section 2. PP',
            'pp_2_1_a'=>"Have you personally visited a live poultry market in the last year?",
            'pp_2_1_b'=>"Approximately how often did you visit live poultry markets in the last year?",
            'pp_2_2'=>"What is the full name of the last (i.e. most recent) live poultry market you visited?",
            'pp_2_3_a'=>"Is that market known by any other names?",
            'pp_2_3_b'=>"What are the other names of that market?",
            'pp_2_4'=>'What thana is this market located in?',
            'pp_2_5'=>'About when did you visit this market?',
            'pp_2_5_i'=>'Convert all options into days.',
            'pp_2_6_a'=>'Did anyone else from your household (including domestic helpers) go with you on this visit?',
            'pp_2_6_b'=>'About how old is that person?',
            'pp_2_6_b_i'=>'If multiple individuals, record ages of each individual.',
            'pp_2_7_a'=>'About how far is this market from your residence?',
            'pp_2_7_a_i'=>'Record kilometers to 1 decimal place.',
            'pp_2_7_b'=>'Is this the market you usually visit in DCC?',
            'pp_2_7_c'=>'What is the full name of the market you usually visit?',
            'pp_2_7_c_i'=>'Record market in DCC (start typing and list of possible options will appear).',
            'pp_2_8_a'=>'Is the market you usually visit known by any other names?',
            'pp_2_8_b'=>'What are the other names of the market you usually visit?',
            'pp_2_8_b_i'=>'Record market (start typing and list of possible options will appear).',
            'pp_2_9'=>'What thana is the market you usually visit located in?',
            'pp_2_9_i'=>'Record name of Thana (start typing and list of possible options will appear).',
            'pp_2_10'=>'About how far is the market you usually visit from your residence?',
            'pp_2_10_i'=>'Record kilometers to 1 decimal place.',

            'pp_2_11_a'=>'Approximately how often have you personally purchased broiler chickens from live poultry markets in the last year?',
            'pp_2_11_a_i'=>'Choose option that is closest/best approximation.',
            'pp_2_11_b'=>'Approximately how often have you personally purchased sonali chickens from live poultry markets in the last year?',
            'pp_2_11_b_i'=>'Choose option that is closest/best approximation',
            'pp_2_11_c'=>'Approximately how often have you personally purchased deshi chickens from live poultry markets in the last year?',
            'pp_2_11_c_i'=>'Choose option that is closest/best approximation',
            'pp_2_11_d'=>'Approximately how often have you personally purchased ducks or geese from live poultry markets in the last year?',
            'pp_2_11_d_i'=>'Choose option that is closest/best approximation',
            'pp_2_12_a'=>'Do you pick up/touch live poultry with your hands before you buy it?',
            'pp_2_12_b'=>'How often do you do that?',
            'pp_2_13_a'=>'Do you touch cages/baskets containing live poultry with your hands before you buy it?',
            'pp_2_13_b'=>'How often do you do that?',
            'pp_2_14_a'=>'Where do you usually slaughter live poultry after buying it?',
            'pp_2_14_a_i'=>'If other please record value in text box',
            'pp_2_14_b'=>'Where in the market is the poultry usually slaughtered?',
            'pp_2_14_b_i'=>'If other please record value in text box',
            'pp_2_15_a'=>'Has anyone else in your household (including domestic helpers) visited a live poultry market in the last year?',
            'pp_2_15_b'=>'About how old is that person?',
            'pp_2_15_b_i'=>'If multiple individuals, record ages of each individual.',
            'pp_2_15_c'=>'Approximately how often did that person visit live poultry markets in the last year?',
            'pp_2_15_c_i'=>'Choose option that is closest/best approximation. If other please record value in text box',
            'pp_2_16_a'=>'In the last year, where have you/your household acquired live poultry?',
            'pp_2_16_a_i'=>'If other please record value in text box',
            'pp_2_16_b'=>'Approximately how often did you buy live poultry from mobile vendors in the last year?',
            'pp_2_16_b_i'=>'Choose option that is closest/best approximation. If other please record value in text box',

            'pfp_3'=>'Section 3. PFP',
            'pfp_3_1_a'=>'Have you personally slaughtered or helped slaughter poultry in the last year?',
            'pfp_3_1_b'=>'Does anyone else from your household (including domestic helpers) help you with slaughtering?',
            'pfp_3_1_c'=>'About how old is that person?',
            'pfp_3_1_c_i'=>'If multiple individuals, record ages of each individual.',
            'pfp_3_1_d'=>'When poultry is slaughtered at the market, do you stand near the stall and watch?',
            'pfp_3_2_a'=>'Have you personally de-feathered or helped de-feather poultry in the last year?',
            'pfp_3_2_b'=>'What tools do you usually use when de-feathering poultry?',
            'pfp_3_2_b_i'=>'Select all that apply. If other please record value in text box',
            'pfp_3_2_c'=>'Does anyone else from your household (including domestic helpers) help you with de-feathering?',
            'pfp_3_2_d'=>'About how old is that person?',
            'pfp_3_2_d_i'=>'If multiple individuals, record ages of each individual. ',
            'pfp_3_2_e'=>'When poultry is de-feathered at the market, do you stand near the stall and watch?',
            'pfp_3_2_f'=>'What tools are usually used for de-feathering at the stall?',
            'pfp_3_3_a'=>'Have you personally eviscerated or helped eviscerate poultry in the last year?',
            'pfp_3_3_b'=>'Does anyone else from your household (including domestic helpers) help you with eviscerating?',
            'pfp_3_3_c'=>'About how old is that person?',
            'pfp_3_3_c_i'=>'If multiple individuals, record ages of each individual.',
            'pfp_3_3_d'=>'When poultry is eviscerated at the market, do you stand near the stall and watch?',
            'pfp_3_4_a'=>'Have you personally cut poultry into pieces or helped cut poultry into pieces in the last year?',
            'pfp_3_4_b'=>'Does anyone else from your household (including domestic helpers) help you with cutting poultry?',
            'pfp_3_4_c'=>'About how old is that person?',
            'pfp_3_4_c_i'=>'If multiple individuals, record ages of each individual.',


            'pm_4'=>'Section 4. PM',
            'pm_4_1_a'=>'After visiting a live poultry market do you take off your shoes before entering the house?',
            'pm_4_1_b'=>'How often do you do that?',
            'pm_4_2_a'=>'After visiting a live poultry market do you wash your hands immediately after returning home?',
            'pm_4_2_b'=>'How often do you do that?',
            'pm_4_2_c'=>'Do you use soap when washing your hands?',
            'pm_4_2_d'=>'How often do you do that?',
            'pm_4_3_a'=>'When visiting live poultry markets do you wear a face mask?',
            'pm_4_3_b'=>'How often do you do that?',

            'pm_4_4'=>'During poultry slaughtering do you:',
            'pm_4_4_a'=>'wear gloves?',
            'pm_4_4_b'=>'How often do you do that?',
            'pm_4_4_c'=>'wear a face mask?',
            'pm_4_4_d'=>'How often do you do that?',
            'pm_4_4_e'=>'wear an apron?',
            'pm_4_4_f'=>'How often do you do that?',
            'pm_4_4_g'=>'wash your hands after?',
            'pm_4_4_h'=>'How often do you do that?',
            'pm_4_4_i'=>'Use soap when washing your hands?',
            'pm_4_4_j'=>'How often do you do that?',

            'pm_4_5'=>'During poultry de-feathering do you:',
            'pm_4_5_a'=>'wear gloves?',
            'pm_4_5_b'=>'How often do you do that?',
            'pm_4_5_c'=>'wear a face mask?',
            'pm_4_5_d'=>'How often do you do that?',
            'pm_4_5_e'=>'wear an apron?',
            'pm_4_5_f'=>'How often do you do that?',
            'pm_4_5_g'=>'wash your hands after?',
            'pm_4_5_h'=>'How often do you do that?',
            'pm_4_5_i'=>'Use soap when washing your hands?',
            'pm_4_5_j'=>'How often do you do that?',

            'pm_4_6'=>'During poultry eviscerating do you:',
            'pm_4_6_a'=>'wear gloves?',
            'pm_4_6_b'=>'How often do you do that?',
            'pm_4_6_c'=>'wear a face mask?',
            'pm_4_6_d'=>'How often do you do that?',
            'pm_4_6_e'=>'wear an apron?',
            'pm_4_6_f'=>'How often do you do that?',
            'pm_4_6_g'=>'wash your hands after?',
            'pm_4_6_h'=>'How often do you do that?',
            'pm_4_6_i'=>'Use soap when washing your hands?',
            'pm_4_6_j'=>'How often do you do that?',

            'pm_4_7'=>'During cutting poultry into pieces do you:',
            'pm_4_7_a'=>'wear gloves?',
            'pm_4_7_b'=>'How often do you do that?',
            'pm_4_7_c'=>'wear a face mask?',
            'pm_4_7_d'=>'How often do you do that?',
            'pm_4_7_e'=>'wear an apron?',
            'pm_4_7_f'=>'How often do you do that?',
            'pm_4_7_g'=>'wash your hands after?',
            'pm_4_7_h'=>'How often do you do that?',
            'pm_4_7_i'=>'Use soap when washing your hands?',
            'pm_4_7_j'=>'How often do you do that?',

            'i_5'=>'Section 5. I',
            'i_5_1_a'=>'In the past 10 days, have you had a fever?',
            'i_5_1_b'=>'Was your fever measured at ≥ 100.4°F?',
            'i_5_1_c'=>'Was your fever accompanied by a cough?',
            'i_5_1_d'=>'Was your fever accompanied by a sore throat?',
            'i_5_2_a'=>'When did this illness start?',
            'i_5_2_a_i'=>'Convert all options into days. I.e. 1 week ago = 7 days',
            'i_5_3_a'=>'In the 3 days before you became unwell, did you visit a live poultry market or prepare poultry at home?',
            'i_5_3_b'=>'Did you seek medical care for this illness?',
            'i_5_3_c'=>'Where did you seek medical care?',
            'i_5_4_a'=>'In the past 10 days, did anyone in your household (including domestic helpers) have a fever',
            'i_5_4_a_i'=>'If multiple individuals, record for each individual',
            'i_5_4_b'=>'Was their fever measured at ≥ 100.4°F?',
            'i_5_4_c'=>'Was their fever accompanied by a cough?',
            'i_5_4_d'=>'Was their fever accompanied by a sore throat?',
            'i_5_5_a'=>'When did their illness start?',
            'i_5_5_a_i'=>'Convert all options into days. I.e. 1 week ago = 7 days',
            'i_5_5_b'=>'About how old is that person?',
            'i_5_5_b_i'=>'If multiple individuals, record ages of each individual. ',
            'i_5_6_a'=>'In the 3 days before they became unwell, did they visit a live poultry market or prepare poultry at home?',
            'i_5_6_b'=>'Did they seek medical care for this illness?',
            'i_5_6_c'=>'Where did they seek medical care?',

            'd_6'=>'Section 6. D',
            'd_6_1'=>'What is your marital status?',
            'd_6_1_i'=>'If other please record value in text box',
            'd_6_2'=>'What is the highest level of education you have completed (in years)?',
            'd_6_2_i'=>'If no education/illiterate record 0. Record only in completed years. I.e. If completed 7_5 years of education, write down 7.If necessary ask relevant questions.',
            'd_6_3'=>'What is your primary occupation (i.e. main source of income)?',
            'd_6_3_i'=>'If other please record value in text box',
            'd_6_4'=>'Does your household keep live poultry (i.e. backyard poultry), or any other birds?',
            'd_6_5_a'=>'How many people are living in your household (khana), including yourself?',
            'd_6_5_a_i'=>'Khana= Food from 1 pot. Record full number',
            'd_6_5_b'=>'Out of all people living your household, how many are children <18 years of age?',
            'd_6_5_b_i'=>'Record full number',
            'd_6_5_c'=>'Out of all people living in your household, how many are children <5 years of age?',
            'd_6_5_c_i'=>'Record full number',
            'finishing_text'=>'The interview is completed',
            ],
            'bn'=>[

            '0.0.0.i'=>'আপনাকে ধন্যবাদ, আপনি সাক্ষাৎকার গ্রহণের জন্য বিবেচিত হয়েছেন । এই জরিপে আপনার মুরগির বাজারে (পোল্ট্রি মার্কেটে) যাওয়ার ইতিহাস ও খাদ্য প্রস্তুতের অভ্যাস সম্পর্কিত প্রশ্ন রয়েছে । আমি কি পরবর্তী প্রশ্নগুলো করতে পারি?',
            '0.0.1.i'=>'আমি প্রথমে আপনার ঢাকা সিটি কর্পোরেশন এলাকায় বসবাসের স্থান সম্পর্কে কিছু সাধারণ প্রশ্ন করবো',
            '0.0.2.i'=>'এখন আমি আপনার স্বাভাবিক পোল্ট্রি ক্রয়ের অভ্যাস সম্পর্কে আলোচনা করতে চাই। পোল্ট্রি বলতে এখানে আমরা মুরগি, হাঁস, রাজহাঁস, ইত্যাদি বুঝিয়েছি ।',
            '0.0.3.i'=>'এখন, আমি আপনাকে আপনার পোল্ট্রি খাদ্য প্রস্তুতি অনুশীলন সম্পর্কে কিছু প্রশ্ন করতে চাই।',
            '0.0.4.i'=>'এখন, হাঁসমুরগি নাড়াচাড়া/ ঘাঁটাঘাঁটি (হ্যান্ডলিং) করার সময় আপনি নিজের সুরক্ষার জন্য কি ধরণের সরঞ্জাম ব্যবহার করেন সে সম্পর্কে কিছু প্রশ্ন জিজ্ঞাসা করতে চাই।',
            '0.0.5.i'=>'এখন, আমি আপনার স্বাস্থ্য সম্পর্কে কিছু প্রশ্ন করতে চাই ',
            '0.0.6.i'=>'আপনার ও আপনার পরিবার সম্পর্কে আমার কিছু শেষ  প্রশ্ন আছে।',
            '0'=>'<strong>আসসালাম ওয়ালাইকুম!</strong></br> প্রিয় স্যার/ ম্যাডাম, আমি গণপ্রজাতন্ত্রী বাংলাদেশের স্বাস্থ্য ও পরিবার কল্যাণ মন্ত্রণালয়ের অন্তর্ভুক্ত একটি সরকারি প্রতিষ্ঠান রোগতত্ত্ব, রোগ নিয়ন্ত্রণ ও গবেষণা ইনস্টিটিউট থেকে কল করছি । আমরা স্বাস্থ্য সম্পর্কিত একটি সংক্ষিপ্ত জরিপ পরিচালনা করছি, যার জন্য আমরা আপনার একটি সাক্ষাত্কার নিতে চাই । সাক্ষাৎকারটির জন্য আপনাকে প্রায় ১০ মিনিট সময় দিতে হবে এবং এর মাধ্যমে সংগৃহীত তথ্য আমাদের সংক্রামক রোগের বিস্তার প্রতিরোধে সহায়তা করবে । অংশগ্রহণ সম্পূর্ণ আপনার ঐচ্ছিক এবং আপনি যে কোন সময় কথা বলা/ সাক্ষাৎকার দেয়া বন্ধ করতে পারেন । আপনার দেয়া উত্তর সম্পূর্ণ গোপনীয় রাখা হবে । আপনার কি এখন এই ব্যাপারে কথা বলার মত যথেষ্ট সময় আছে? আমরা কি শুরু করবো? <ul><li>উত্তরদাতা সম্মত হলে তাকে ধন্যবাদ দিয়ে স্ক্রিনিং প্রশ্ন-১ থেকে শুরু করতে হবে । </li><li>উত্তরদাতা সাক্ষাৎকার দিতে সম্মত না হলে কথা বলার জন্য উৎসাহিত করতে হবে, তারপরেও রাজি না হলে ধন্যবাদ ও সমাপনী বক্তব্য দিয়ে কল শেষ করতে হবে </li><li>উত্তরদাতা পরবর্তী কোন সময়ে সাক্ষাৎকার দিতে সম্মত হলে, সাক্ষাৎকারের জন্য তার অ্যাপয়েন্টমেন্ট নিতে হবে ( পরবর্তীতে সাক্ষাতকারের জন্য অ্যাপয়েন্টমেন্ট নেয়া)</li></ul>',
            '0_'=>"পরবর্তীতে সাক্ষাতকারের জন্য অ্যাপয়েন্টমেন্ট নেয়া",
            '0_0'=>"সাক্ষাৎকারের এর জন্য আপনাকে কল করার সুবিধাজনক সময় কখন? ",

            's'=>'SQ & SC',
            's_0_1'=>"আপনি আজ কেমন আছেন/ বোধ করছেন?",
            's_0_2'=>"আপনার বয়স কত বলবেন কি?",
            's_0_2_i'=>"আমরা শুধুমাত্র ১৮ বছর এবং তার বেশি বয়সের লোকদের সাক্ষাত্কার নিচ্ছি । যদি উত্তরদাতা ১৮ বছরের কম বয়সী হন, তবে তাদের জানান যে তারা সাক্ষাৎকারের জন্য বিবেচিত হচ্ছেন না। সময় দেয়ার জন্য তাদের ধন্যবাদ জানান এবং কল শেষ করুন । <br> যদি উত্তরদাতা ১৮ বছর বা তার বেশি বয়সী হন, তাহলে পূর্ণ সংখ্যায় বয়সটি লিখুন । অর্থাৎ যদি বয়স ২৫ বছর ১১ মাস হয়, তবে বয়সের ঘরে ২৫ বছর লিখুন । প্রয়োজনে প্রাসঙ্গিক প্রশ্ন জিজ্ঞাসা করুন ",
            's_0_3'=>"আপনি কি বর্তমানে ঢাকা সিটি করপোরেশন এর অন্তর্ভুক্ত এলাকায় বাস করেন? ",
            's_0_3_i'=>"উত্তর ০/ ৯৯ হলে তাদের জানান যে তারা সাক্ষাতকারের জন্য বিবেচিত হচ্ছেন না । সময় দেয়ার জন্য তাদের ধন্যবাদ জানান এবং কল শেষ করুন ।",
            's_0_4'=>"আপনি কি অন্তত গত এক বছর ধরে এখানে বাস করছেন?",
            's_0_4_i'=>"উত্তর ০/ ৯৯ হলে তাদের জানান যে তারা সাক্ষাতকারের জন্য বিবেচিত হচ্ছেন না । সময় দেয়ার জন্য তাদের ধন্যবাদ জানান এবং কল শেষ করুন । <br>দ্রষ্টব্যঃ যদি উত্তরদাতা গত বছরের মধ্যে সিটি কর্পোরেশন এলাকার বাইরে চলে যেয়ে থাকেন, কিন্তু তার বাসার ঠিকানা ডিসিসি বলে মনে করেন, তবে তাকে অন্তর্ভুক্ত করা হবে ।",
            'sc_0_1'=>"আপনি কি এই জরিপে অংশগ্রহণ করতে রাজি আছেন? ",
            'sc_0_1_i'=>"উত্তর ০/ ৯৯ হলে তাদের জানান যে তারা সাক্ষাতকারের জন্য বিবেচিত হচ্ছেন না । সময় দেয়ার জন্য তাদের ধন্যবাদ জানান এবং কল শেষ করুন ।",

            'gi_1'=>'Section 1: GI',
            'gi_1_1'=>"উত্তরদাতা পুরুষ না মহিলা তা বোঝার চেষ্টা করুন। প্রয়োজন হলে জিজ্ঞাসা করুন: আপনার লিঙ্গ কি?",
            'gi_1_1_i'=>"অনুগ্রহপূর্বক সরাসরি জিজ্ঞাসা করা এড়িয়ে চলুন ।",
            'gi_1_2_a'=>"আপনি কোন থানায় বসবাস করেন? ",
            'gi_1_2_a_i'=>"ডিসিসি এলাকায় কোন থানা ও এলাকায় বাস করেন তা লিপিবদ্ধ করুন (টাইপ শুরু করুন, তাহলে সম্ভাব্য অপশনগুলির তালিকা প্রদর্শিত হবে) । প্রয়োজনে প্রাসঙ্গিক প্রশ্ন জিজ্ঞাসা করুন ।",
            'gi_1_2_b'=>"আপনি কোন এলাকায় বসবাস করেন?",
            'gi_1_2_b_i'=>"ডিসিসি এলাকায় কোন থানা ও এলাকায় বাস করেন তা লিপিবদ্ধ করুন (টাইপ শুরু করুন, তাহলে সম্ভাব্য অপশনগুলির তালিকা প্রদর্শিত হবে) । প্রয়োজনে প্রাসঙ্গিক প্রশ্ন জিজ্ঞাসা করুন ।",

            'pp_2'=>'Section 2. PP',
            'pp_2_1_a'=>"গত এক বছরে আপনি নিজে কোন হাঁসমুরগির কাঁচা বাজারে গিয়েছেন?",
            'pp_2_1_b'=>"গত বছর আনুমানিক কতটা নিয়মিতভাবে আপনি হাঁসমুরগির কাঁচা বাজারে গেছেন?",
            'pp_2_2'=>"সর্বশেষ যে হাঁসমুরগির কাঁচা বাজারে গিয়েছেন তার পূর্ণ নাম কি?",
            'pp_2_3_a'=>"সেই বাজারের কি আরও অন্য কোন নাম আছে?",
            'pp_2_3_b'=>"সেই বাজারের অন্য নামটি কি ?",
            'pp_2_4'=>'বাজারটি কোন থানায় অবস্থিত ?',
            'pp_2_5'=>'আপনি কতদিন আগে এই বাজারে গিয়েছিলেন?',
            'pp_2_5_i'=>'সকল উত্তর দিনের সংখ্যায় রুপান্তর করুন। যেমন- ১ মাস= ৩০ দিন, ৬ মাস= ১৮০ দিন',
            'pp_2_6_a'=>'আপনার বাড়ির আর কেউ (কাজের লোক সহ) কি আপনার সাথে এই বাজারে গিয়েছিলেন?',
            'pp_2_6_b'=>'সেই ব্যক্তিটির বয়স কত? ',
            'pp_2_6_b_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার বয়স লিপিবদ্ধ করুন ',
            'pp_2_7_a'=>'আপনার বাসস্থান থেকে এই বাজার কতদূর? ',
            'pp_2_7_a_i'=>'কিলোমিটারের মান এক দশমিক স্থান পর্যন্ত লিখুন।যেমন- ১.০, ১.১, ১.২, ইত্যাদি',
            'pp_2_7_b'=>'আপনি কি সাধারণত এই বাজারেই যান?',
            'pp_2_7_c'=>'আপনি সাধারণত যেই বাজার এ যান ওই বাজার এর পুরো নাম কি?',
            'pp_2_7_c_i'=>'বাজারের নাম লিখুন (টাইপ করা শুরু করলে সম্ভাব্য বাজারের নামগুলি দেখাবে, সেখান থেকে নির্বাচন করুন)',
            'pp_2_8_a'=>'এই বাজারের কি আরও অন্য কোন নাম আছে?',
            'pp_2_8_b'=>'বাজারের অন্য নামটি কি ?',
            'pp_2_8_b_i'=>'বাজারের নাম লিখুন (টাইপ করা শুরু করলে সম্ভাব্য বাজারের নামগুলি দেখাবে, সেখান থেকে নির্বাচন করুন)',
            'pp_2_9'=>' বাজারটি কোন থানায় অবস্থিত?',
            'pp_2_9_i'=>'থানার নাম লিখুন (টাইপ করা শুরু করলে সম্ভাব্য থানার নামগুলি দেখাবে, সেখান থেকে নির্বাচন করুন)',
            'pp_2_10'=>'আপনি সাধারণত যে বাজারে যান তা আপনার বাসস্থান থেকে কত কিলোমিটার দূরে?',
            'pp_2_10_i'=>'কিলোমিটারের মান এক দশমিক স্থান পর্যন্ত লিখুন।যেমন- ১.০, ১.১, ১.২, ইত্যাদি',

            'pp_2_11_a'=>'হাঁসমুরগির কাঁচা বাজার থেকে গত এক বছরে আপনি আনুমানিক কতবার ব্রয়লার মুরগি কিনেছেন?',
            'pp_2_11_a_i'=>'যে অপশন টি উত্তরের সবচেয়ে কাছাকাছি হয় সেটি নির্বাচন করুন।',
            'pp_2_11_b'=>'হাঁসমুরগির কাঁচা বাজার থেকে গত এক বছরে আপনি আনুমানিক কতবার সোনালী মুরগি কিনেছেন?',
            'pp_2_11_b_i'=>'যে অপশন টি উত্তরের সবচেয়ে কাছাকাছি হয় সেটি নির্বাচন করুন।',
            'pp_2_11_c'=>'হাঁসমুরগির কাঁচা বাজার থেকে গত এক বছরে আপনি আনুমানিক কতবার দেশি মুরগি কিনেছেন?',
            'pp_2_11_c_i'=>'যে অপশন টি উত্তরের সবচেয়ে কাছাকাছি হয় সেটি নির্বাচন করুন।',
            'pp_2_11_d'=>'হাঁসমুরগির কাঁচা বাজার থেকে গত এক বছরে আপনি আনুমানিক কতবার হাঁস বা রাজহাঁস কিনেছেন?',
            'pp_2_11_d_i'=>'যে অপশন টি উত্তরের সবচেয়ে কাছাকাছি হয় সেটি নির্বাচন করুন।',
            'pp_2_12_a'=>'আপনি কি কেনার আগে জ্যান্ত হাঁস বা মুরগি ধরে/ স্পর্শ করে দেখেন?',
            'pp_2_12_b'=>'আপনি এটা কতটা নিয়মিত করেন?',
            'pp_2_13_a'=>'আপনি কি কেনার আগে জ্যান্ত হাঁস বা মুরগির খাঁচা বা ঝুড়ি ধরে/ স্পর্শ করে দেখেন?',
            'pp_2_13_b'=>'আপনি এটা কতটা নিয়মিত করেন?',
            'pp_2_14_a'=>'আপনি জ্যান্ত হাঁস বা মুরগি কেনার পর কোথায় জবাই করেন?',
            'pp_2_14_a_i'=>'১-  ২.১৪বি প্রশ্নে যান অন্যান্য উত্তর এর ক্ষেত্রে টেক্সট বক্সে লিখুন',
            'pp_2_14_b'=>'বাজারের কোথায় সাধারণত হাঁসমুরগি জবাই করা হয়?',
            'pp_2_14_b_i'=>'অন্যান্য উত্তর এর ক্ষেত্রে টেক্সট বক্সে লিখুন',
            'pp_2_15_a'=>'আপনার পরিবারের আর কেউ (বাড়ির কাজের লোক সহ) কি গত এক বছরে হাঁসমুরগির কাঁচা বাজারে গেছেন?',
            'pp_2_15_b'=>'ঐ ব্যক্তির বয়স কত?',
            'pp_2_15_b_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার বয়স লিপিবদ্ধ করুন ',
            'pp_2_15_c'=>'গত বছর আনুমানিক কতটা নিয়মিত ঐ ব্যক্তি হাঁসমুরগির কাঁচা বাজারে গেছেন?',
            'pp_2_15_c_i'=>'যে অপশন টি উত্তরের সবচেয়ে কাছাকাছি হয় সেটি নির্বাচন করুন।<br>অন্যান্য এর ক্ষেত্রে সংখ্যাটি টেক্সট বক্সে লিখুন।',
            'pp_2_16_a'=>'গত বছর, আপনি / আপনার পরিবার কোথা থেকে জ্যান্ত হাঁসমুরগি সংগ্রহ করেছেন? ',
            'pp_2_16_a_i'=>'অন্যান্য উত্তর এর ক্ষেত্রে টেক্সট বক্সে লিখুন',
            'pp_2_16_b'=>'গত বছর আনুমানিক কতটা নিয়মিতভাবে আপনি ভ্রাম্যমাণ বিক্রেতা থেকে হাঁসমুরগি কিনেছেন?',
            'pp_2_16_b_i'=>'যে অপশন টি উত্তরের সবচেয়ে কাছাকাছি হয় সেটি নির্বাচন করুন।<br>অন্যান্য এর ক্ষেত্রে সংখ্যাটি টেক্সট বক্সে লিখুন।',

            'pfp_3'=>'Section 3. PFP',
            'pfp_3_1_a'=>'আপনি গত এক বছরে নিজে কোন হাঁসমুরগি জবাই করেছেন বা জবাই করতে সাহায্য করেছেন?',
            'pfp_3_1_b'=>'আপনার বাড়ির আর কেউ (কাজের লোক সহ) আপনাকে জবাই এর কাজে সাহায্য করেছে?',
            'pfp_3_1_c'=>'ঐ ব্যক্তির বয়স কত?',
            'pfp_3_1_c_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার বয়স লিপিবদ্ধ করুন ',
            'pfp_3_1_d'=>'বাজারে যখন হাঁসমুরগি জবাই হয়, তখন আপনি কি দোকানের কাছে দাঁড়িয়ে থেকে দেখেন?',
            'pfp_3_2_a'=>'গত এক বছরে আপনি নিজে কোন হাঁসমুরগির পালক ছাড়িয়েছেন বা ছাড়াতে সাহায্য করেছেন?',
            'pfp_3_2_b'=>'হাঁসমুরগির পালক ছাড়াতে আপনি কিসের সাহায্য নেন?',
            'pfp_3_2_b_i'=>'সকল প্রযোজ্য উত্তরই লিপিবদ্ধ করুন। <br> অন্যান্য উত্তরের ক্ষেত্রে টেক্সট বক্সে উত্তর টি লিখে রাখুন',
            'pfp_3_2_c'=>'আপনার বাড়ির আর কেউ (কাজের লোক সহ) আপনাকে পালক ছড়ানোর কাজে সাহায্য করেছে?',
            'pfp_3_2_d'=>'ঐ ব্যক্তির বয়স কত?',
            'pfp_3_2_d_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার বয়স লিপিবদ্ধ করুন',
            'pfp_3_2_e'=>'বাজারে যখন হাঁসমুরগির পালক ছাড়ানো হয়, তখন আপনি কি দোকানের কাছে দাঁড়িয়ে থেকে দেখেন? ',
            'pfp_3_2_f'=>'দোকানে পালক ছাড়ানোর সময় কি পদ্ধতি ব্যবহার করা হয়?',
            'pfp_3_3_a'=>'গত এক বছরে আপনি নিজে কোন হাঁসমুরগির নাড়িভুঁড়ি বের করেছেন বা করতে সাহায্য করেছেন?',
            'pfp_3_3_b'=>'আপনার বাড়ির আর কেউ (কাজের লোক সহ) আপনাকে নাড়িভুঁড়ি বের করার কাজে সাহায্য করেছে?',
            'pfp_3_3_c'=>'ঐ ব্যক্তির বয়স কত?',
            'pfp_3_3_c_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার বয়স লিপিবদ্ধ করুন।',
            'pfp_3_3_d'=>'বাজারে যখন হাঁসমুরগির নাড়িভুঁড়ি বের করা হয়, তখন আপনি কি দোকানের কাছে দাঁড়িয়ে থেকে দেখেন?',
            'pfp_3_4_a'=>'গত এক বছরে আপনি নিজে কোন হাঁসমুরগি কেটে টুকরো করেছেন বা করতে সাহায্য করেছেন?',
            'pfp_3_4_b'=>'আপনার বাড়ির আর কেউ (কাজের লোক সহ) আপনাকে হাঁস-মুরগি  কেটে টুকরো করার কাজে সাহায্য করেছে?',
            'pfp_3_4_c'=>'ঐ ব্যক্তির বয়স কত?',
            'pfp_3_4_c_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার বয়স লিপিবদ্ধ করুন ',


            'pm_4'=>'Section 4. PM',
            'pm_4_1_a'=>'হাঁসমুরগির কাঁচা বাজার থেকে ফিরে ঘরে ঢোকার আগে কি আপনি জুতো খুলে ফেলেন?',
            'pm_4_1_b'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_2_a'=>'হাঁসমুরগির কাঁচা বাজার থেকে বাড়িতে ফিরে আপনি কি সাথে সাথেই হাত ধুয়ে ফেলেন? ',
            'pm_4_2_b'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_2_c'=>'হাত ধোয়ার সময় কি আপনি সাবান ব্যবহার করেন? ',
            'pm_4_2_d'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_3_a'=>'হাঁসমুরগির কাঁচা বাজারে গেলে আপনি কি মুখে মাস্ক ব্যবহার করেন?',
            'pm_4_3_b'=>'এটা আপনি কতটা নিয়মিত করেন?',

            'pm_4_4'=>'হাঁস-মুরগি জবাই করার সময়:-',
            'pm_4_4_a'=>'গ্লাভস (হাতমোজা/ দস্তানা) ব্যবহার করেন?',
            'pm_4_4_b'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_4_c'=>'মুখে মাস্ক পরেন?',
            'pm_4_4_d'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_4_e'=>'কোন এপ্রন পরেন?',
            'pm_4_4_f'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_4_g'=>'জবাই এর পর আপনার হাত ধুয়ে ফেলেন?',
            'pm_4_4_h'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_4_i'=>'হাত ধোয়ার সময় সাবান ব্যবহার করেন?',
            'pm_4_4_j'=>'এটা আপনি কতটা নিয়মিত করেন?',

            'pm_4_5'=>'হাঁসমুরগির পালক ছাড়ানোর সময়:-',
            'pm_4_5_a'=>'গ্লাভস (হাতমোজা/ দস্তানা) ব্যবহার করেন?',
            'pm_4_5_b'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_5_c'=>'মুখে মাস্ক পরেন?',
            'pm_4_5_d'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_5_e'=>'কোন এপ্রন পরেন?',
            'pm_4_5_f'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_5_g'=>'পালক ছাড়ানোর পর আপনার হাত ধুয়ে ফেলেন?',
            'pm_4_5_h'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_5_i'=>'হাত ধোয়ার সময় সাবান ব্যবহার করেন?',
            'pm_4_5_j'=>'এটা আপনি কতটা নিয়মিত করেন?',

            'pm_4_6'=>'হাঁসমুরগির নাড়িভুঁড়ি পরিস্কার করার সময়:-',
            'pm_4_6_a'=>'গ্লাভস (হাতমোজা/ দস্তানা) ব্যবহার করেন?',
            'pm_4_6_b'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_6_c'=>'মুখে মাস্ক পরেন?',
            'pm_4_6_d'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_6_e'=>'কোন এপ্রন পরেন?',
            'pm_4_6_f'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_6_g'=>' নাড়িভুঁড়ি পরিস্কার করার পর আপনার হাত ধুয়ে ফেলেন?',
            'pm_4_6_h'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_6_i'=>'হাত ধোয়ার সময় সাবান ব্যবহার করেন?',
            'pm_4_6_j'=>'এটা আপনি কতটা নিয়মিত করেন?',

            'pm_4_7'=>'হাঁসমুরগি কেটে টুকরো করার সময়:-',
            'pm_4_7_a'=>'গ্লাভস (হাতমোজা/ দস্তানা) ব্যবহার করেন?',
            'pm_4_7_b'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_7_c'=>'মুখে মাস্ক পরেন?',
            'pm_4_7_d'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_7_e'=>'কোন এপ্রন পরেন?',
            'pm_4_7_f'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_7_g'=>'কাটাকাটি করার পর আপনার হাত ধুয়ে ফেলেন?',
            'pm_4_7_h'=>'এটা আপনি কতটা নিয়মিত করেন?',
            'pm_4_7_i'=>'হাত ধোয়ার সময় সাবান ব্যবহার করেন?',
            'pm_4_7_j'=>'এটা আপনি কতটা নিয়মিত করেন?',

            'i_5'=>'Section 5. I',
            'i_5_1_a'=>'গত ১০ দিনে আপনার কি জ্বর হয়েছিল ?',
            'i_5_1_b'=>'জ্বর কি ১০০.৪ ডিগ্রি ফারেনহাইটের বেশি পাওয়া গিয়েছিল ?',
            'i_5_1_c'=>'আপনার কি জ্বরের সঙ্গে কাশিও ছিল?',
            'i_5_1_d'=>'আপনার কি জ্বরের সঙ্গে গলা ব্যাথাও ছিল?',
            'i_5_2_a'=>'এই অসুস্থতা কত দিন আগে শুরু হয়েছিল ? ',
            'i_5_2_a_i'=>'সকল উত্তর দিনে রূপান্তর করুন। যেমনঃ ১ সপ্তাহ আগে= ৭ দিন আগে।',
            'i_5_3_a'=>'অসুস্থ হওয়ার আগের তিন দিনের মধ্যে আপনি কি হাঁসমুরগির কাঁচা বাজারে গিয়েছিলেন, অথবা বাড়িতে হাঁসমুরগি কাটাকাটির কাজ করেছিলেন?',
            'i_5_3_b'=>'এই অসুস্থতার কারণে আপনি কি চিকিৎসা সেবা নিয়েছিলেন?',
            'i_5_3_c'=>'আপনি কোথায় চিকিৎসা সেবা নিয়েছিলেন?',
            'i_5_4_a'=>'গত ১০ দিনে কি আপনার বাড়ির কেউ (কাজের লোক সহ) জ্বরে আক্রান্ত হয়েছিল ?',
            'i_5_4_a_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার  লিপিবদ্ধ করুন',
            'i_5_4_b'=>'জ্বর কি ১০০.৪ ডিগ্রি ফারেনহাইটের বেশি পাওয়া গিয়েছিল ?',
            'i_5_4_c'=>'তাদের কি জ্বরের সঙ্গে কাশিও ছিল?',
            'i_5_4_d'=>'তাদের কি জ্বরের সঙ্গে গলা ব্যাথাও ছিল? ',
            'i_5_5_a'=>'এই অসুস্থতা কত দিন আগে শুরু হয়েছিল ? ',
            'i_5_5_a_i'=>'সকল উত্তর দিনে রূপান্তর করুন। যেমনঃ ১ সপ্তাহ আগে= ৭ দিন আগে। ',
            'i_5_5_b'=>'ঐ ব্যক্তির বয়স কত?',
            'i_5_5_b_i'=>'একাধিক ব্যক্তি হয়ে থাকলে সবার বয়স লিপিবদ্ধ করুন ',
            'i_5_6_a'=>'অসুস্থ হওয়ার আগের তিন দিনের মধ্যে কি তারা হাঁসমুরগির কাঁচা বাজারে গিয়েছিলো, অথবা বাড়িতে হাঁসমুরগি কাটাকাটির কাজ করেছিলো?',
            'i_5_6_b'=>'এই অসুস্থতার কারণে তারা কি চিকিৎসা সেবা নিয়েছিল?',
            'i_5_6_c'=>'তারা কোথায় চিকিৎসা সেবা নিয়েছিলেন?',

            'd_6'=>'Section 6. D',
            'd_6_1'=>'আপনার বৈবাহিক অবস্থা কি?',
            'd_6_1_i'=>'তাহলে টেক্সট বক্স-এ অন্যান্য দয়া রেকর্ড মান ',
            'd_6_2'=>'আপনি সর্বোচ্চ কত দূর পর্যন্ত লেখাপড়া করেছেন?',
            'd_6_2_i'=>'শিক্ষা না থাকলে বা অশিক্ষিত হলে ০ (শূণ্য) লিখুন।শুধুমাত্র সমাপ্তকৃত বছরের সংখ্যা লিখুন। যেমন- ৭.৫ বছরের শিক্ষা সমাপ্ত করে থাকলে ৭ লিখুন। প্রয়োজনে প্রাসঙ্গিক প্রশ্ন করুন',
            'd_6_3'=>'আপনার মূল পেশা (অর্থাৎ অর্থ আয়ের প্রধান উৎস) কি?',
            'd_6_3_i'=>'If other please record value in text box',
            'd_6_4'=>'আপনার বাড়িতে কি জ্যান্ত হাঁসমুরগি (যেমন বাড়ির উঠানে) বা অন্য কোন ধরণের পাখি রাখা হয়',
            'd_6_5_a'=>'আপনার বাড়িতে (এক রান্নায় খাওয়া) আপনি সহ মোট কতজন মানুষ বসবাস করছেন ? ',
            'd_6_5_a_i'=>'খানা = একই পাতিলে রান্না করা খাবার খায় এমন লোকজন',
            'd_6_5_b'=>'আপনার বাড়িতে (এক রান্নায় খাওয়া) বসবাসকারী সকল সদস্যদের মধ্যে কতজনের বয়স ১৮ বছরের কম?',
            'd_6_5_b_i'=>'উত্তর পূর্ণ সংখ্যায় লিখুন',
            'd_6_5_c'=>'আপনার পরিবারের বাসিন্দাদের মধ্যে, কতজন শিশু ৫ বছরের কম বয়সী? ',
            'd_6_5_c_i'=>'উত্তর পূর্ণ সংখ্যায় লিখুন',
            'finishing_text'=>'সাক্ষাৎকার সম্পন্ন হয়েছে',
        ]][session('language')];
    }
}
