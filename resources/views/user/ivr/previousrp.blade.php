@if($previous_respondent)
<div class="col-md-12 col-sm-12">
    <table class="table table-bordered" style="font-size: 11px;color:#fff !important;background-color: #000;">
        <tr>
            <th colspan="2" style="font-size: 11px;color:#fff !important;">
                Primary Respondent Information
            </th>
        </tr>
        <tr>
            <th style="font-size: 11px;color:#fff !important;">{!! @App\Models\IvrPrCati::questionText()['q_3'] !!}</th>
            <td style="font-size: 11px;color:#fff !important;">
              {!! @App\Models\IvrPrCati::getGender($previous_respondent->q_3) !!}  
            </td>
        </tr>
        <tr>
            <th style="font-size: 11px;color:#fff !important;">{!! @App\Models\IvrPrCati::questionText()['q_2'] !!}</th>
            <td style="font-size: 11px;color:#fff !important;">
              {!! $previous_respondent->q_2 !!}  
            </td>
        </tr>
        <tr>
            <th style="font-size: 11px;color:#fff !important;">{!! @App\Models\IvrPrCati::questionText()['q_9'] !!}</th>
            <td style="font-size: 11px;color:#fff !important;">
              {!! @App\Models\IvrPrCati::getRelatedTo($previous_respondent->q_9) !!}  
            </td>
        </tr>

        <tr>
            <th style="font-size: 11px;color:#fff !important;">তার সাথে যোগাযোগ করা হয়েছিল</th>
            <td style="font-size: 11px;color:#fff !important;">
              {!! date('d/m/Y H:i a',strtotime($previous_respondent->start_time)) !!}  
            </td>
        </tr>
    </table>
    
</div>


@endif
