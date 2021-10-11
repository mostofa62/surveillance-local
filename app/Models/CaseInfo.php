<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseInfo extends Model
{
    protected $table = 'case_info';

    protected $fillable = [
        'lab_id',
        //31-03-2020
        'spec_c_date',
        'name',
        'age',
        'ocu',
        'mob',
        'email',
        'sex',
        'age_type',
        'confm_type',
        'emr_type',
        'adds',
        'coll_from',
        'coll_ads',
        'dis',
        'up',
        'mc',
        'thana',
        'citycorp',
        'user_id',
        'result',


        //30-03-2020

        'ref',
     'ins_name',
     'ins_dept',
     'ins_unit',
     'ins_unit_head',
     'ins_ward',
     'ins_cabin',
     'fev',
     'headache',
     'cough',
     'breath',
     //01-04-2020
     'onset',
     'lng',
     'lat',
     'txt_oth_symp',
     'cr',
     'th',
     'th_coun',
     'th_date',
     'cc',
     'hc',
     'copd',
     'asthma',
     'ild',
     'dm',
     'ihd',
     'htn',
     'ckd',
     'cld',
     'md',
     'ost',
     'preg',
     'crf_oth',
     'spec',
     'nasal',
     'throat_swab',
     'sputum',
     'tracheal_aspirate',
     'serum',
     'spec_oth_txt',
     'remarks',
     'in_cond_by',
     //04-04-2020
     'cls_id',
     'cls',
     //08-07-2020
     'bg',
     'nid',
     'paid',
     'free_oth_details',
     'receipt_no',
     'reason',
     'rel',
     'dept_name',
     'service_code',
     'freedom_id'


    ];

   
}
