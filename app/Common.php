<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class Common
{
    //
    Public static function getLabName(){
        return [
            '1'=>'Labaid Hospital',
            '2'=>'Anwar Khan Modern Hospital',
            '3'=>'Central Hospital',
            '4'=>'Green Life Hospital',
            '5'=>'CRL Diagnostic',
            '6'=>'Gonosastho Hospital',
            '7'=>'H Diagnostic Center',
            '8'=>'Green View Clinic',
            '9'=>'Cresent Gastro Liver & General Hospital',
            '9'=>'Northern International Medical College Hospital',
            '10'=>'Bangladesh Medical College Hospital',
            '11'=>'Ibn Sina Diagnostic & Imaging Center',
            '12'=>'Rainbow Heart Diagnostic Center',
            '13'=>'Japan Bangladesh Friendship Hospital',
            '14'=>'Popular Diagnostic Center & Hospital',
            '15'=>'Medinova Medical Services',
            '16'=>'Womens Children & General Hospital',
            '17'=>'CRL Molecular DX Lab'
        ];
    }

    public static function getGenderType()
    {
        return [
            '1'=>'পুরুষ',
            '2'=>'মহিলা'
        ];
    }
    public static function getDengueGenderType()
    {
        return [
            '0'=>'Female',
            '1'=>'Male',
           // '2'=>'Third Gender'
        ];
    }

    public static function getHistory()
    {
        return [
            0=>'Travelled Transmission',
            1=>'Contact History',
            2=>'UnKnown'
        ];
    }


    public static function getLifeStatus()
    {
        return [
            '1'=>'জীবিত',
            '2'=>'মৃত'
        ];
    }
    public static function getFeverStatus()
    {
        return [
            '0'=>'Dengue Fever (DF)',
            '1'=>'Dengue Hemorrhagic Fever (DHF) ',
            '2'=>'Dengue Shock Syndrome (DSS)',
            '3'=>'None'
        ];
    }
    public static function getDengueSymptom()
    {
        return [
            '0'=>'Fever',
            '1'=>'Retro-orbital Pain',
            '2'=>'Anorexia',
            '3'=>'Myalgia',
            '4'=>'Loose Motion',
            '5'=>'Rash',
        ];
    }
    public static function getHospitalType()
    {
        return [
            '1'=>'Primary',
            '2'=>'Secondary',
            '3'=>'Tertiary',
        ];
    }
    public static function getLabTestFETPB(){
        return ['1'=>'Positive','0'=>'Negative'];
    }
    public static function getLabTest(){
        return ['1'=>'Positive','0'=>'Negative', '2'=> 'Not Done'];
    }
    public static function getAreaType(){
        return ['1'=>'Rural','2'=>'Urban'];
    }
    public static function getDengueYesNoType(){
        return [0=> 'No', 1=> 'Yes'];
    }
    public static function getDengueComorbidity(){
        return [ 0=>'Diabetes Mellitus', 1=>'Hypertension',2=>'Pregnancy', 3=>'Bronchial Asthma ', 4=>'COPD', 5=>'Malignancy', 6=>'Others', 88=>'Don\'t Know', 99=>'None'];
    }
    public static function getPatientCondition(){
        return [88=>'প্রযোজ্য নয়', 99=>'কোনও সমস্যা হয় নাই/ সুস্থ ছিলেন', 1=>'প্যারালাইসিস', 2=>'শ্রবণ শক্তি নাই',3=>'স্মৃতিশক্তি নেই', 4=>'মুখ বাঁকা হয়ে যাওয়া', 5=>'বাকশক্তি নাই', 77=>'অন্যান্য'];
    }
    public static function getIdentityType(){
        return [0=> 'রোগী নিজে', 1=> 'রোগী নিজে নয়'];
    }
    public static function getYesNoType(){
        return [0=> 'না', 1=> 'হ্যাঁ'];
    }
    public static function getYesNoDontKnow(){
        return [0=> 'না', 1=> 'হ্যাঁ', 77=>'নিশ্চিত নয়'];
    }
    public static function getReligion(){
        return [0=>'ইসলাম', 1=>'হিন্দু', 2=>'বৌদ্ধ', 4=>'খৃস্টান', 77=> 'অন্যান্য'];
    }
    public static function getEthnicType(){
        return [1=>'সাঁওতাল', 2=>'গারো', 3=>'মারমা', 4=>'চাকমা', 77=> 'অন্যান্য'];
    }
    public static function getEducationalBackground(){
        return [0=>'নিরক্ষর',1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10',11=>'11',12=>'12', 44=> 'এস এস সি', 55=> 'এইচ এস সি', 66=> 'ডিগ্রী', 22=> 'অপ্রাতিষ্ঠানিক শিক্ষা', 77=> 'অন্যান্য'];
    }
    public static function getProfession(){
        return [0=>'বেকার', 1=>'কৃষিকাজ', 2=>'গৃহিণী', 3=>'চাকুরী', 4=>'গৃহস্থালির কাজ', 5=> 'দিনমজুর/ কামলা/ রাখাল', 6=>'রিকশা চালক', 7=>'দোকানদার', 8=>'ব্যবসা', 9=>'শিক্ষক', 10=> 'ছাত্র', 11=> 'গৃহ পরিচারিকা', 77=> 'অন্যান্য'];
    }
    public static function getFatherProfession(){
        return [0=>'বেকার', 1=>'কৃষিকাজ', 2=>'চাকুরী', 3=> 'রাখাল', 4=>'গৃহস্থালির কাজ', 5=> 'দিনমজুর/ কামলা', 6=>'রিকশা চালক', 7=>'দোকানদার', 8=>'ব্যবসা', 9=>'শিক্ষক', 77=> 'অন্যান্য'];
    }
    public static function getExpenditureType(){
        return [0=>'মাসিক খরচ জানি', 1=>'মাসিক খরচ জানি না', 2=>'মাসিক খরচ বলতে রাজী নয়'];
    }

    public static function getLivingPlace(){
        return [0=>'গ্রাম', 1=>'শহর', 2=>'উপ-শহর', 3=>'শহর বস্তি এলাকা', 77=> 'অন্যান্য'];
    }
    public static function getOutOfTheHouse(){
        return [0=> 'একবারও না', 1=>'প্রতিদিন', 2=>'মাঝে মাঝে(৪-৫ দিন)', 3=>'হঠাৎ হঠাৎ (২-৩ দিন)', 4=> 'এক দিন', 77=>'নিশ্চিত নয়'];
    }
    public static function getOutOfTheHouseReason(){
        return [0=>'কৃষিকাজ', 1=>'দোকানে', 2=> 'বাজারে', 3=> 'বন্ধুদের সাথে আড্ডা দিতে', 77=>'অন্যান্য'];
    }
    public static function getHouseFloor(){
        return [0=>'মাটি',1=>'ইট', 2=>'কাঠ', 77=>'অন্যান্য'];
    }
    public static function getHouseWall(){
        return [0=>'বেড়া', 1=>'কাঠ/শোলা', 2=>'মাটি', 3=>'ইট', 4=>'টিন', 5=>'বাঁশ', 6=>'কাঠ', 7=>'পলিথিন', 77=> 'অন্যান্য'];
    }
    public static function getHouseCeilling(){
        return [0=>'ইট', 1=>'কাঠ/শোলা', 2=>'টালি', 3=>'খড়', 4=>'টিন', 5=>'বাঁশ', 6=>'কাঠ', 7=>'পলিথিন', 77=> 'অন্যান্য'];
    }
    public static function getHouseAttachment(){
        return [0=>'মূল বসতঘরের সাথে সংযুক্ত', 1=>'মূল বসতঘরের থেকে আলাদা'];
    }
    public static function getNoneHouseAttachment(){
        return [-1=>'নাই',0=>'মূল বসতঘরের সাথে সংযুক্ত', 1=>'মূল বসতঘরের থেকে আলাদা'];
    }
    public static function getDomesticAnimal(){
        return ['গরু/বাছুর', 'মহিষ', 'ছাগল', 'ভেড়া', 'মুরগী', 'হাঁস', 'কবুতর', 'কুকুর', 'বিড়াল', 'শুকর'];
    }
    public static function getScheduleSuveillance(){
        return [0=>'সাক্ষাৎকার অসম্পূর্ণ ও আজই বা পরবর্তী কর্মদিবসে রিশিডিউল করা হয়েছে', 3=>'সাক্ষাৎকার অসম্পূর্ণ ও আজই বা পরবর্তি কর্মদিবসে রিশিডিউল করা হয়নি'];
    }
    public static function getCallStatus(){
        return [ 2=>'যোগাযোগ করা সম্ভব হয়নি', 4=>'সম্মতি দেন নাই', 5=>'মোবাইল বন্ধ'];
    }
    public static function checkBoxGenerate($stack, $name, $valueFlag=0, $dataStack=array(),$isBreak=true ){
        $input="";
        foreach($stack as $key=>$value){
            if ($valueFlag==0){
                if(is_array($dataStack)&&in_array($key,$dataStack)) {
                    $input .= '<input checked="checked" class="' . $name . '" id="' . $name . '_' . $key . '" type="checkbox" name="'.$name.'_'.$key.'" value="' . $key . '">' . $value;
                }else
                    $input.='<input class="'.$name.'" id="'.$name.'_'.$key.'" type="checkbox" name="'.$name.'_'.$key.'" value="'.$key.'">'.$value;
            }
            else
            {
                if(is_array($dataStack)&&in_array($value,$dataStack)) {
                    $input .= '<input checked="checked" class="' . $name . '" id="' . $name . '_' . $key . '" type="checkbox" name="'.$name.'_'.$key.'" value="' . $value . '">' . $value;
                }else
                    $input.='<input class="'.$name.'" id="'.$name.'_'.$key.'" type="checkbox" name="'.$name.'_'.$key.'" value="'.$value.'">'.$value;
            }
            if($isBreak==true)
                $input.="<br>";
            else $input.="      ";

        }
        return $input;
    }
    public static function checkBoxArrayGenerate($stack, $name, $valueFlag=0, $dataStack=array(),$isBreak=true ){
        $input="";
        foreach($stack as $key=>$value){
            if ($valueFlag==0){
                if(is_array($dataStack)&&in_array($key,$dataStack)) {
                    $input .= '<input checked="checked" class="' . $name . '" id="' . $name . '_' . $key . '" type="checkbox" name="'.$name.'[]" value="' . $key . '">' . $value;
                }else
                    $input.='<input class="'.$name.'" id="'.$name.'_'.$key.'" type="checkbox" name="'.$name.'[]" value="'.$key.'">'.$value;
            }
            else
            {
                if(is_array($dataStack)&&in_array($value,$dataStack)) {
                    $input .= '<input checked="checked" class="' . $name . '" id="' . $name . '_' . $key . '" type="checkbox" name="'.$name.'[]" value="' . $value . '">' . $value;
                }else
                    $input.='<input class="'.$name.'" id="'.$name.'_'.$key.'" type="checkbox" name="'.$name.'[]" value="'.$value.'">'.$value;
            }
            if($isBreak==true)
                $input.="<br>";
            else $input.="      ";

        }
        return $input;
    }
    public static function radioButtonGenerate($stack, $name, $valueFlag=0, $Datavalue="", $isBreak=false,$extra=null ){
        $input="";
        foreach($stack as $key=>$value){
            if ($valueFlag==0){
                if($key===$Datavalue) {
                    $input .= "<input checked='checked' class='" . $name . "' id='" . $name . "_" . $key . "' type='radio' name='" . $name . "' value='" . $key . "' $extra> <label style='display:inline;' for='".$name."_" .$key ."'>" . $value."</label>";
                }else
                    $input.="<input class='".$name."' id='".$name."_".$key."' type='radio' name='".$name."' value='".$key."' $extra> <label style='display:inline;' for='".$name."_" .$key ."'>" . $value."</label>";
            }
            else
            {
                if($value===$Datavalue) {
                    $input .= "<input checked='checked' class='" . $name . "' id='" . $name . "_" . $key . "' type='radio' name='" . $name . "' value='" . $value . "' $extra> <label style='display:inline;' for='".$name."_" .$key ."'>" . $value."</label>";
                }else
                    $input.="<input class='".$name."' id='".$name."_".$key."' type='radio' name='".$name."' value='".$value."' $extra> <label style='display:inline;' for='".$name."_" .$key ."'>" . $value."</label>";
            }
            if($isBreak==true)
                 $input.="<br>";
            else $input.="      ";
        }
        return $input;
    }
    public static function radioButtonGenerateJs($stack, $name, $valueFlag=0, $Datavalue="", $isBreak=false, $jsFunction="javascript(void)" ){
        $input="";
        foreach($stack as $key=>$value){
            if ($valueFlag==0){
                if($key===$Datavalue) {
                    $input .= "<input checked='checked' class='" . $name . "' id='" . $name . "_" . $key . "' type='radio' name='" . $name . "' value='" . $key . "' onclick='" . $jsFunction . "'>" . $value;
                }else
                    $input.="<input class='".$name."' id='".$name."_".$key."' type='radio' name='".$name."' value='".$key."' onclick='" . $jsFunction . "'>".$value;
            }
            else
            {
                if($value===$Datavalue) {
                    $input .= "<input checked='checked' class='" . $name . "' id='" . $name . "_" . $key . "' type='radio' name='" . $name . "' value='" . $value . "' onclick='" . $jsFunction . "'>" . $value;
                }else
                    $input.="<input class='".$name."' id='".$name."_".$key."' type='radio' name='".$name."' value='".$value."' onclick='" . $jsFunction . "'>".$value;
            }
            if($isBreak==true)
                 $input.="<br>";
            else $input.="      ";
        }
        return $input;
    }
}
