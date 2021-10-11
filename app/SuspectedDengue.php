<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SuspectedDengue extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function site()
    {
        return $this->hasOne('App\Site', 'id', 'site_id');
    }

    Public static function clinical_presentation()
    {
        return [0 => ['General Signs/symptoms', 'Fever	(>100° F)', 'Headache', 'Myalgia', 'Arthralgia', 'Retro-orbital pain', 'Abdominal pain', 'Anorexia', 'Nausea', 'Vomiting', 'Loose motion', 'Rash', 'Itching', 'Erythema', 'Facial flushing', 'Hepatomegaly'],
            1 => ['Bleeding Manifestation', 'Positive tourniquet test', 'Petechiae', 'Gum bleeding', 'Hematemesis', 'Malena/ GI bleeding', 'Epistaxis', 'Vaginal bleeding', 'Purpura', 'Haematuria'],
            2 => ['Capillary Permeability', 'Odema', 'Giddiness/Postural hypotension', 'Profuse perspiration', 'Raised Hematocrit', 'Pleural effusion', 'Ascites'],
            3 => ['Shock', 'Altered mental state', 'Capillary refill time >2 sec', 'Cold, clammy extremities', 'Tachypnea', 'Tachycardia', 'Feeble peripheral pulse', 'Narrow pulse pressure', 'Metabolic acidosis'],
            4 => ['Organ impairment', 'Chest pain', 'Cyanosis', 'Convulsions', 'Respiratory distress', 'Decreased urine output', 'Coma'],
            5 => ['Co-morbid illness / Any Other Risk Factors', 'Diabetes', 'Pregnancy', 'Peptic Ulcer', 'Liver disease', 'Hypertension', 'Renal disease'],
        ];
    }
    public static function laboratory_findings()
    {
        return ['Haemoglobin (g/dl)', 'Hematocrit', 'WBC count', 'Platelet count', 'Blood sugar', 'Urea', 'Creatinine', 'SGOT', 'SGPT', 'Serum bilirubin', 'Total proteins', 'Albumin', 'Globulin', 'Sodium', 'Potassium', 'X-ray', 'ECG', 'Ultrasound'];
    }
    public static function clinical_examination_findings()
    {
        return ['Temperature','Respiratory rate','Pulse rate','Blood pressure','Pulse pressure','Capillary refill time'];
    }
    public static function treatment_history(){
        return [
            0=>['IV fluids','Normal saline','Ringer lactate','Colloids','Any other'],
            1=>['Blood transfusion','Platelet concentrate','Whole blood','Packed cells'],
            2=>['Ionotropic support','Dopamine/ Dobutamine','Adrenaline','Dialysis','ICU support']
        ];
    }
    public static function ReasonOfNo(){
        return ['More than 5 days of onset of dengue fever','Other'];
    }
}
