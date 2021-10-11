

function checkSkipLogic() {
    if ($('.pp_2_1_a:checked').val() == 1) {
        $('.pp_2_15_a:checked').removeAttr('checked');
        $('.pp_2_15_a').attr('disabled', 'disabled');
        $('.pp_2_15_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_15_b').val('');
        $('.pp_2_15_b').attr('disabled', 'disabled');
        $('.pp_2_15_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_15_c_flag').val('');
        $('.pp_2_15_c_value').val('');
        $('.pp_2_15_c_flag').attr('disabled', 'disabled');
        $('.pp_2_15_c_value').attr('disabled', 'disabled');
        $('.pp_2_15_c_value').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_16_a_flag').val('');
        $('#pp_2_16_a_value').val('');
        $('#pp_2_16_a_flag').attr('disabled', 'disabled');
        $('#pp_2_16_a_value').attr('disabled', 'disabled');
        $('#pp_2_16_a_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_16_b_flag').val('');
        $('#pp_2_16_b_value').val('');
        $('#pp_2_16_b_flag').attr('disabled', 'disabled');
        $('#pp_2_16_b_value').attr('disabled', 'disabled');
        $('#pp_2_16_b_value').parent().parent().attr('style', 'color:#a6a6a6');
    } else {
        $('#pp_2_1_b_value').val('');
        $('#pp_2_1_b_flag').val('');
        $('#pp_2_1_b_flag').attr('disabled', 'disabled');
        $('#pp_2_1_b_value').attr('disabled', 'disabled');
        $('#pp_2_1_b_value').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_2_value').val('');
        $('.pp_2_2_flag:checked').removeAttr('checked');
        $('#pp_2_2_value').attr('disabled', 'disabled');
        $('.pp_2_2_flag').attr('disabled', 'disabled');
        $('#pp_2_2_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_3_a:checked').removeAttr('checked');
        $('.pp_2_3_a').attr('disabled', 'disabled');
        $('.pp_2_3_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_3_b_value').val('');
        $('.pp_2_3_b_flag:checked').removeAttr('checked');
        $('#pp_2_3_b_value').attr('disabled', 'disabled');
        $('.pp_2_3_b_flag').attr('disabled', 'disabled');
        $('#pp_2_3_b_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_4_value').val('');
        $('.pp_2_4_flag:checked').removeAttr('checked');
        $('#pp_2_4_value').attr('disabled', 'disabled');
        $('.pp_2_4_flag').attr('disabled', 'disabled');
        $('#pp_2_4_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_5_value').val('');
        $('.pp_2_5_flag:checked').removeAttr('checked');
        $('#pp_2_5_value').attr('disabled', 'disabled');
        $('.pp_2_5_flag').attr('disabled', 'disabled');
        $('.pp_2_5_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_6_a:checked').removeAttr('checked');
        $('.pp_2_6_a').attr('disabled', 'disabled');
        $('.pp_2_6_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_6_b').val('');
        $('.pp_2_6_b').attr('disabled', 'disabled');
        $('.pp_2_6_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_7_a_value').val('');
        $('.pp_2_7_a_flag:checked').removeAttr('checked');
        $('#pp_2_7_a_value').attr('disabled', 'disabled');
        $('.pp_2_7_a_flag').attr('disabled', 'disabled');
        $('.pp_2_7_a_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_7_b:checked').removeAttr('checked');
        $('.pp_2_7_b').attr('disabled', 'disabled');
        $('.pp_2_7_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_7_c_value').val('');
        $('.pp_2_7_c_flag:checked').removeAttr('checked');
        $('#pp_2_7_c_value').attr('disabled', 'disabled');
        $('.pp_2_7_c_flag').attr('disabled', 'disabled');
        $('#pp_2_7_c_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_8_a:checked').removeAttr('checked');
        $('.pp_2_8_a').attr('disabled', 'disabled');
        $('.pp_2_8_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_8_b_value').val('');
        $('.pp_2_8_b_flag:checked').removeAttr('checked');
        $('#pp_2_8_b_value').attr('disabled', 'disabled');
        $('.pp_2_8_b_flag').attr('disabled', 'disabled');
        $('#pp_2_8_b_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_9_value').val('');
        $('.pp_2_9_flag:checked').removeAttr('checked');
        $('#pp_2_9_value').attr('disabled', 'disabled');
        $('.pp_2_9_flag').attr('disabled', 'disabled');
        $('#pp_2_9_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_10_value').val('');
        $('.pp_2_10_flag:checked').removeAttr('checked');
        $('#pp_2_10_value').attr('disabled', 'disabled');
        $('.pp_2_10_flag').attr('disabled', 'disabled');
        $('.pp_2_10_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_11_a').val('');
        $('#pp_2_11_a').attr('disabled', 'disabled');
        $('#pp_2_11_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_11_b').val('');
        $('#pp_2_11_b').attr('disabled', 'disabled');
        $('#pp_2_11_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_11_c').val('');
        $('#pp_2_11_c').attr('disabled', 'disabled');
        $('#pp_2_11_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_11_d').val('');
        $('#pp_2_11_d').attr('disabled', 'disabled');
        $('#pp_2_11_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_12_a:checked').removeAttr('checked');
        $('.pp_2_12_a').attr('disabled', 'disabled');
        $('.pp_2_12_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_12_b').val('');
        $('#pp_2_12_b').attr('disabled', 'disabled');
        $('#pp_2_12_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_13_a:checked').removeAttr('checked');
        $('.pp_2_13_a').attr('disabled', 'disabled');
        $('.pp_2_13_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_13_b').val('');
        $('#pp_2_13_b').attr('disabled', 'disabled');
        $('#pp_2_13_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_14_a_flag').val('');
        $('#pp_2_14_a_value').val('');
        $('#pp_2_14_a_flag').attr('disabled', 'disabled');
        $('#pp_2_14_a_value').attr('disabled', 'disabled');
        $('#pp_2_14_a_value').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_14_b_flag').val('');
        $('#pp_2_14_b_value').val('');
        $('#pp_2_14_b_value').attr('disabled', 'disabled');
        $('#pp_2_14_b_flag').attr('disabled', 'disabled');
        $('#pp_2_14_b_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_1_d:checked').removeAttr('checked');
        $('.pfp_3_1_d').attr('disabled', 'disabled');
        $('.pfp_3_1_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_2_e:checked').removeAttr('checked');
        $('.pfp_3_2_e').attr('disabled', 'disabled');
        $('.pfp_3_2_e').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pfp_3_2_f_flag').val('');
        $('#pfp_3_2_f_value').val('');
        $('#pfp_3_2_f_value').attr('disabled', 'disabled');
        $('#pfp_3_2_f_flag').attr('disabled', 'disabled');
        $('#pfp_3_2_f_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_3_d:checked').removeAttr('checked');
        $('.pfp_3_3_d').attr('disabled', 'disabled');
        $('.pfp_3_3_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_2_e:checked').removeAttr('checked');
        $('.pfp_3_2_e').attr('disabled', 'disabled');
        $('.pfp_3_2_e').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_1_b').val('');
        $('#pp_2_13_b').attr('disabled', 'disabled');
        $('#pp_2_13_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_2_a:checked').removeAttr('checked');
        $('.pm_4_2_a').attr('disabled', 'disabled');
        $('.pm_4_2_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_2_b').val('');
        $('#pm_4_2_b').attr('disabled', 'disabled');
        $('#pm_4_2_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_2_c:checked').removeAttr('checked');
        $('.pm_4_2_c').attr('disabled', 'disabled');
        $('.pm_4_2_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_2_d').val('');
        $('#pm_4_2_d').attr('disabled', 'disabled');
        $('#pm_4_2_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_3_a:checked').removeAttr('checked');
        $('.pm_4_3_a').attr('disabled', 'disabled');
        $('.pm_4_3_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_3_b').val('');
        $('#pm_4_3_b').attr('disabled', 'disabled');
        $('#pm_4_3_b').parent().parent().attr('style', 'color:#a6a6a6');

    }
    if ($('.pp_2_3_a:checked').val() != 1) {
        $('#pp_2_3_b_value').val('');
        $('.pp_2_3_b_flag:checked').removeAttr('checked');
        $('#pp_2_3_b_value').attr('disabled', 'disabled');
        $('.pp_2_3_b_flag').attr('disabled', 'disabled');
        $('#pp_2_3_b_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');
    }

    if ($('.pp_2_6_a:checked').val() != 1) {
        $('.pp_2_6_b').val('');
        $('.pp_2_6_b').attr('disabled', 'disabled');
        $('.pp_2_6_b').parent().parent().attr('style', 'color:#a6a6a6');
    }

    if ($('.pp_2_7_b:checked').val() != 0) {
        $('#pp_2_7_c_value').val('');
        $('.pp_2_7_c_flag:checked').removeAttr('checked');
        $('#pp_2_7_c_value').attr('disabled', 'disabled');
        $('.pp_2_7_c_flag').attr('disabled', 'disabled');
        $('#pp_2_7_c_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_8_a:checked').removeAttr('checked');
        $('.pp_2_8_a').attr('disabled', 'disabled');
        $('.pp_2_8_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_8_b_value').val('');
        $('.pp_2_8_b_flag:checked').removeAttr('checked');
        $('#pp_2_8_b_value').attr('disabled', 'disabled');
        $('.pp_2_8_b_flag').attr('disabled', 'disabled');
        $('#pp_2_8_b_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_9_value').val('');
        $('.pp_2_9_flag:checked').removeAttr('checked');
        $('#pp_2_9_value').attr('disabled', 'disabled');
        $('.pp_2_9_flag').attr('disabled', 'disabled');
        $('#pp_2_9_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_10_value').val('');
        $('.pp_2_10_flag:checked').removeAttr('checked');
        $('#pp_2_10_value').attr('disabled', 'disabled');
        $('.pp_2_10_flag').attr('disabled', 'disabled');
        $('.pp_2_10_flag').parent().parent().attr('style', 'color:#a6a6a6');
    }

    if ($('.pp_2_8_a:checked').val() != 1) {
        $('#pp_2_8_b_value').val('');
        $('.pp_2_8_b_flag:checked').removeAttr('checked');
        $('#pp_2_8_b_value').attr('disabled', 'disabled');
        $('.pp_2_8_b_flag').attr('disabled', 'disabled');
        $('#pp_2_8_b_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pp_2_12_a:checked').val() != 1) {
        $('#pp_2_12_b').val('');
        $('#pp_2_12_b').attr('disabled', 'disabled');
        $('#pp_2_12_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pp_2_13_a:checked').val() != 1) {
        $('#pp_2_13_b').val('');
        $('#pp_2_13_b').attr('disabled', 'disabled');
        $('#pp_2_13_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('#pp_2_14_a_flag').val() != 1) {
        $('#pp_2_14_b_flag').val('');
        $('#pp_2_14_b_value').val('');
        $('#pp_2_14_b_value').attr('disabled', 'disabled');
        $('#pp_2_14_b_flag').attr('disabled', 'disabled');
        $('#pp_2_14_b_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_1_d:checked').removeAttr('checked');
        $('.pfp_3_1_d').attr('disabled', 'disabled');
        $('.pfp_3_1_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_2_e:checked').removeAttr('checked');
        $('.pfp_3_2_e').attr('disabled', 'disabled');
        $('.pfp_3_2_e').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pfp_3_2_f_flag').val('');
        $('#pfp_3_2_f_value').val('');
        $('#pfp_3_2_f_value').attr('disabled', 'disabled');
        $('#pfp_3_2_f_flag').attr('disabled', 'disabled');
        $('#pfp_3_2_f_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_3_d:checked').removeAttr('checked');
        $('.pfp_3_3_d').attr('disabled', 'disabled');
        $('.pfp_3_3_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pp_2_15_a:checked').val() == 1) {
        $('#pp_2_16_a_flag').val('');
        $('#pp_2_16_a_value').val('');
        $('#pp_2_16_a_flag').attr('disabled', 'disabled');
        $('#pp_2_16_a_value').attr('disabled', 'disabled');
        $('#pp_2_16_a_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pp_2_16_b_flag').val('');
        $('#pp_2_16_b_value').val('');
        $('#pp_2_16_b_flag').attr('disabled', 'disabled');
        $('#pp_2_16_b_value').attr('disabled', 'disabled');
        $('#pp_2_16_b_value').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pp_2_15_a:checked').val() != 1) {
        $('.pp_2_15_b').val('');
        $('.pp_2_15_b').attr('disabled', 'disabled');
        $('.pp_2_15_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pp_2_15_c_flag').val('');
        $('.pp_2_15_c_value').val('');
        $('.pp_2_15_c_flag').attr('disabled', 'disabled');
        $('.pp_2_15_c_value').attr('disabled', 'disabled');
        $('.pp_2_15_c_value').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('#pp_2_16_a_flag').val() != 1) {
        $('#pp_2_16_b_flag').val('');
        $('#pp_2_16_b_value').val('');
        $('#pp_2_16_b_flag').attr('disabled', 'disabled');
        $('#pp_2_16_b_value').attr('disabled', 'disabled');
        $('#pp_2_16_b_value').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pfp_3_1_a:checked').val() != 1) {
        $('.pfp_3_1_b:checked').removeAttr('checked');
        $('.pfp_3_1_b').attr('disabled', 'disabled');
        $('.pfp_3_1_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_1_c').val('');
        $('.pfp_3_1_c').attr('disabled', 'disabled');
        $('.pfp_3_1_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_4_a:checked').removeAttr('checked');
        $('.pm_4_4_a').attr('disabled', 'disabled');
        $('.pm_4_4_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_4_b').val('');
        $('#pm_4_4_b').attr('disabled', 'disabled');
        $('#pm_4_4_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_4_c:checked').removeAttr('checked');
        $('.pm_4_4_c').attr('disabled', 'disabled');
        $('.pm_4_4_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_4_d').val('');
        $('#pm_4_4_d').attr('disabled', 'disabled');
        $('#pm_4_4_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_4_e:checked').removeAttr('checked');
        $('.pm_4_4_e').attr('disabled', 'disabled');
        $('.pm_4_4_e').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_4_f').val('');
        $('#pm_4_4_f').attr('disabled', 'disabled');
        $('#pm_4_4_f').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_4_g:checked').removeAttr('checked');
        $('.pm_4_4_g').attr('disabled', 'disabled');
        $('.pm_4_4_g').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_4_h').val('');
        $('#pm_4_4_h').attr('disabled', 'disabled');
        $('#pm_4_4_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_4_i:checked').removeAttr('checked');
        $('.pm_4_4_i').attr('disabled', 'disabled');
        $('.pm_4_4_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_4_j').val('');
        $('#pm_4_4_j').attr('disabled', 'disabled');
        $('#pm_4_4_j').parent().parent().attr('style', 'color:#a6a6a6');

    }
    if ($('.pfp_3_1_b:checked').val() != 1) {
        $('.pfp_3_1_c').val('');
        $('.pfp_3_1_c').attr('disabled', 'disabled');
        $('.pfp_3_1_c').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pfp_3_2_a:checked').val() != 1) {
        $('#pfp_3_2_b_flag').val('');
        $('#pfp_3_2_b_value').val('');
        $('#pfp_3_2_b_flag').attr('disabled', 'disabled');
        $('#pfp_3_2_b_value').attr('disabled', 'disabled');
        $('#pfp_3_2_b_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_2_c:checked').removeAttr('checked');
        $('.pfp_3_2_c').attr('disabled', 'disabled');
        $('.pfp_3_2_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_2_d').val('');
        $('.pfp_3_2_d').attr('disabled', 'disabled');
        $('.pfp_3_2_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_5_a:checked').removeAttr('checked');
        $('.pm_4_5_a').attr('disabled', 'disabled');
        $('.pm_4_5_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_5_b').val('');
        $('#pm_4_5_b').attr('disabled', 'disabled');
        $('#pm_4_5_b').parent().parent().attr('style', 'color:#a6a6a6');
        $('.pm_4_5_c:checked').removeAttr('checked');
        $('.pm_4_5_c').attr('disabled', 'disabled');
        $('.pm_4_5_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_5_d').val('');
        $('#pm_4_5_d').attr('disabled', 'disabled');
        $('#pm_4_5_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_5_e:checked').removeAttr('checked');
        $('.pm_4_5_e').attr('disabled', 'disabled');
        $('.pm_4_5_e').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_5_f').val('');
        $('#pm_4_5_f').attr('disabled', 'disabled');
        $('#pm_4_5_f').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_5_g:checked').removeAttr('checked');
        $('.pm_4_5_g').attr('disabled', 'disabled');
        $('.pm_4_5_g').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_5_h').val('');
        $('#pm_4_5_h').attr('disabled', 'disabled');
        $('#pm_4_5_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_5_i:checked').removeAttr('checked');
        $('.pm_4_5_i').attr('disabled', 'disabled');
        $('.pm_4_5_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_5_j').val('');
        $('#pm_4_5_j').attr('disabled', 'disabled');
        $('#pm_4_5_j').parent().parent().attr('style', 'color:#a6a6a6');
    }

    if ($('.pfp_3_2_c:checked').val() != 1) {
        $('.pfp_3_2_d').val('');
        $('.pfp_3_2_d').attr('disabled', 'disabled');
        $('.pfp_3_2_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pfp_3_2_e:checked').val() != 1) {
        $('#pfp_3_2_f_flag').val('');
        $('#pfp_3_2_f_value').val('');
        $('#pfp_3_2_f_value').attr('disabled', 'disabled');
        $('#pfp_3_2_f_value').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pfp_3_3_a:checked').val() != 1) {
        $('.pfp_3_3_b:checked').removeAttr('checked');
        $('.pfp_3_3_b').attr('disabled', 'disabled');
        $('.pfp_3_3_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_3_c').val('');
        $('.pfp_3_3_c').attr('disabled', 'disabled');
        $('.pfp_3_3_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_6_a:checked').removeAttr('checked');
        $('.pm_4_6_a').attr('disabled', 'disabled');
        $('.pm_4_6_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_6_b').val('');
        $('#pm_4_6_b').attr('disabled', 'disabled');
        $('#pm_4_6_b').parent().parent().attr('style', 'color:#a6a6a6');
        $('.pm_4_6_c:checked').removeAttr('checked');
        $('.pm_4_6_c').attr('disabled', 'disabled');
        $('.pm_4_6_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_6_d').val('');
        $('#pm_4_6_d').attr('disabled', 'disabled');
        $('#pm_4_6_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_6_e:checked').removeAttr('checked');
        $('.pm_4_6_e').attr('disabled', 'disabled');
        $('.pm_4_6_e').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_6_f').val('');
        $('#pm_4_6_f').attr('disabled', 'disabled');
        $('#pm_4_6_f').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_6_g:checked').removeAttr('checked');
        $('.pm_4_6_g').attr('disabled', 'disabled');
        $('.pm_4_6_g').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_6_h').val('');
        $('#pm_4_6_h').attr('disabled', 'disabled');
        $('#pm_4_6_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_6_i:checked').removeAttr('checked');
        $('.pm_4_6_i').attr('disabled', 'disabled');
        $('.pm_4_6_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_6_j').val('');
        $('#pm_4_6_j').attr('disabled', 'disabled');
        $('#pm_4_6_j').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pfp_3_3_b:checked').val() != 1) {
        $('.pfp_3_3_c').val('');
        $('.pfp_3_3_c').attr('disabled', 'disabled');
        $('.pfp_3_3_c').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pfp_3_4_a:checked').val() != 1) {
        $('.pfp_3_4_b:checked').removeAttr('checked');
        $('.pfp_3_4_b').attr('disabled', 'disabled');
        $('.pfp_3_4_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pfp_3_4_c').val('');
        $('.pfp_3_4_c').attr('disabled', 'disabled');
        $('.pfp_3_4_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_7_a:checked').removeAttr('checked');
        $('.pm_4_7_a').attr('disabled', 'disabled');
        $('.pm_4_7_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_7_b').val('');
        $('#pm_4_7_b').attr('disabled', 'disabled');
        $('#pm_4_7_b').parent().parent().attr('style', 'color:#a6a6a6');
        $('.pm_4_7_c:checked').removeAttr('checked');
        $('.pm_4_7_c').attr('disabled', 'disabled');
        $('.pm_4_7_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_7_d').val('');
        $('#pm_4_7_d').attr('disabled', 'disabled');
        $('#pm_4_7_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_7_e:checked').removeAttr('checked');
        $('.pm_4_7_e').attr('disabled', 'disabled');
        $('.pm_4_7_e').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_7_f').val('');
        $('#pm_4_7_f').attr('disabled', 'disabled');
        $('#pm_4_7_f').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_7_g:checked').removeAttr('checked');
        $('.pm_4_7_g').attr('disabled', 'disabled');
        $('.pm_4_7_g').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_7_h').val('');
        $('#pm_4_7_h').attr('disabled', 'disabled');
        $('#pm_4_7_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_7_i:checked').removeAttr('checked');
        $('.pm_4_7_i').attr('disabled', 'disabled');
        $('.pm_4_7_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_7_j').val('');
        $('#pm_4_7_j').attr('disabled', 'disabled');
        $('#pm_4_7_j').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pfp_3_4_b:checked').val() != 1) {
        $('.pfp_3_4_c').val('');
        $('.pfp_3_4_c').attr('disabled', 'disabled');
        $('.pfp_3_4_c').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_1_a:checked').val() != 1) {
        $('#pm_4_1_b').val('');
        $('#pm_4_1_b').attr('disabled', 'disabled');
        $('#pm_4_1_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_2_a:checked').val() != 1) {
        $('#pm_4_2_b').val('');
        $('#pm_4_2_b').attr('disabled', 'disabled');
        $('#pm_4_2_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_2_c:checked').removeAttr('checked');
        $('.pm_4_2_c').attr('disabled', 'disabled');
        $('.pm_4_2_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_2_d').val('');
        $('#pm_4_2_d').attr('disabled', 'disabled');
        $('#pm_4_2_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_2_c:checked').val() != 1) {
        $('#pm_4_2_d').val('');
        $('#pm_4_2_d').attr('disabled', 'disabled');
        $('#pm_4_2_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_3_a:checked').val() != 1) {
        $('#pm_4_3_b').val('');
        $('#pm_4_3_b').attr('disabled', 'disabled');
        $('#pm_4_3_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_4_a:checked').val() != 1) {
        $('#pm_4_4_b').val('');
        $('#pm_4_4_b').attr('disabled', 'disabled');
        $('#pm_4_4_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_4_c:checked').val() != 1) {
        $('#pm_4_4_d').val('');
        $('#pm_4_4_d').attr('disabled', 'disabled');
        $('#pm_4_4_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_4_e:checked').val() != 1) {
        $('#pm_4_4_f').val('');
        $('#pm_4_4_f').attr('disabled', 'disabled');
        $('#pm_4_4_f').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_4_g:checked').val() != 1) {
        $('#pm_4_4_h').val('');
        $('#pm_4_4_h').attr('disabled', 'disabled');
        $('#pm_4_4_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_4_i:checked').removeAttr('checked');
        $('.pm_4_4_i').attr('disabled', 'disabled');
        $('.pm_4_4_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_4_j').val('');
        $('#pm_4_4_j').attr('disabled', 'disabled');
        $('#pm_4_4_j').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_4_i:checked').val() != 1) {
        $('#pm_4_4_j').val('');
        $('#pm_4_4_j').attr('disabled', 'disabled');
        $('#pm_4_4_j').parent().parent().attr('style', 'color:#a6a6a6');
    }

    if ($('.pm_4_5_a:checked').val() != 1) {
        $('#pm_4_5_b').val('');
        $('#pm_4_5_b').attr('disabled', 'disabled');
        $('#pm_4_5_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_5_c:checked').val() != 1) {
        $('#pm_4_5_d').val('');
        $('#pm_4_5_d').attr('disabled', 'disabled');
        $('#pm_4_5_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_5_e:checked').val() != 1) {
        $('#pm_4_5_f').val('');
        $('#pm_4_5_f').attr('disabled', 'disabled');
        $('#pm_4_5_f').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_5_g:checked').val() != 1) {
        $('#pm_4_5_h').val('');
        $('#pm_4_5_h').attr('disabled', 'disabled');
        $('#pm_4_5_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_5_i:checked').removeAttr('checked');
        $('.pm_4_5_i').attr('disabled', 'disabled');
        $('.pm_4_5_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_5_j').val('');
        $('#pm_4_5_j').attr('disabled', 'disabled');
        $('#pm_4_5_j').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_5_i:checked').val() != 1) {
        $('#pm_4_5_j').val('');
        $('#pm_4_5_j').attr('disabled', 'disabled');
        $('#pm_4_5_j').parent().parent().attr('style', 'color:#a6a6a6');
    }

    if ($('.pm_4_6_a:checked').val() != 1) {
        $('#pm_4_6_b').val('');
        $('#pm_4_6_b').attr('disabled', 'disabled');
        $('#pm_4_6_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_6_c:checked').val() != 1) {
        $('#pm_4_6_d').val('');
        $('#pm_4_6_d').attr('disabled', 'disabled');
        $('#pm_4_6_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_6_e:checked').val() != 1) {
        $('#pm_4_6_f').val('');
        $('#pm_4_6_f').attr('disabled', 'disabled');
        $('#pm_4_6_f').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_6_g:checked').val() != 1) {
        $('#pm_4_6_h').val('');
        $('#pm_4_6_h').attr('disabled', 'disabled');
        $('#pm_4_6_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_6_i:checked').removeAttr('checked');
        $('.pm_4_6_i').attr('disabled', 'disabled');
        $('.pm_4_6_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_6_j').val('');
        $('#pm_4_6_j').attr('disabled', 'disabled');
        $('#pm_4_6_j').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_6_i:checked').val() != 1) {
        $('#pm_4_6_j').val('');
        $('#pm_4_6_j').attr('disabled', 'disabled');
        $('#pm_4_6_j').parent().parent().attr('style', 'color:#a6a6a6');
    }

    if ($('.pm_4_7_a:checked').val() != 1) {
        $('#pm_4_7_b').val('');
        $('#pm_4_7_b').attr('disabled', 'disabled');
        $('#pm_4_7_b').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_7_c:checked').val() != 1) {
        $('#pm_4_7_d').val('');
        $('#pm_4_7_d').attr('disabled', 'disabled');
        $('#pm_4_7_d').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_7_e:checked').val() != 1) {
        $('#pm_4_7_f').val('');
        $('#pm_4_7_f').attr('disabled', 'disabled');
        $('#pm_4_7_f').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_7_g:checked').val() != 1) {
        $('#pm_4_7_h').val('');
        $('#pm_4_7_h').attr('disabled', 'disabled');
        $('#pm_4_7_h').parent().parent().attr('style', 'color:#a6a6a6');

        $('.pm_4_7_i:checked').removeAttr('checked');
        $('.pm_4_7_i').attr('disabled', 'disabled');
        $('.pm_4_7_i').parent().parent().attr('style', 'color:#a6a6a6');

        $('#pm_4_7_j').val('');
        $('#pm_4_7_j').attr('disabled', 'disabled');
        $('#pm_4_7_j').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.pm_4_7_i:checked').val() != 1) {
        $('#pm_4_7_j').val('');
        $('#pm_4_7_j').attr('disabled', 'disabled');
        $('#pm_4_7_j').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.i_5_1_a:checked').val() != 1) {
        $('.i_5_1_b:checked').removeAttr('checked');
        $('.i_5_1_b').attr('disabled', 'disabled');
        $('.i_5_1_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_1_c:checked').removeAttr('checked');
        $('.i_5_1_c').attr('disabled', 'disabled');
        $('.i_5_1_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_1_d:checked').removeAttr('checked');
        $('.i_5_1_d').attr('disabled', 'disabled');
        $('.i_5_1_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('#i_5_2_a_value').val('');
        $('#i_5_2_a_value').attr('disabled', 'disabled');
        $('#i_5_2_a_value').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_2_a_flag:checked').removeAttr('checked');
        $('.i_5_2_a_flag').attr('disabled', 'disabled');
        $('.i_5_2_a_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_3_a:checked').removeAttr('checked');
        $('.i_5_3_a').attr('disabled', 'disabled');
        $('.i_5_3_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_3_b:checked').removeAttr('checked');
        $('.i_5_3_b').attr('disabled', 'disabled');
        $('.i_5_3_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('#i_5_2_c_value').val('');
        $('#i_5_2_c_value').attr('disabled', 'disabled');
        $('#i_5_2_c_value').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_2_c_flag').val('');
        $('.i_5_2_c_flag').attr('disabled', 'disabled');
        $('.i_5_2_c_flag').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.i_5_3_b:checked').val() != 1) {
        $('#i_5_2_c_value').val('');
        $('#i_5_2_c_value').attr('disabled', 'disabled');
        $('#i_5_2_c_value').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_2_c_flag').val('');
        $('.i_5_2_c_flag').attr('disabled', 'disabled');
        $('.i_5_2_c_flag').parent().parent().attr('style', 'color:#a6a6a6');
    }
    if ($('.i_5_4_a_flag:checked').val() != 1) {
        $('.i_5_4_b').val('');
        $('.i_5_4_b').attr('disabled', 'disabled');
        $('.i_5_4_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_4_c').val('');
        $('.i_5_4_c').attr('disabled', 'disabled');
        $('.i_5_4_c').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_4_d').val('');
        $('.i_5_4_d').attr('disabled', 'disabled');
        $('.i_5_4_d').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_5_a_value').val('');
        $('.i_5_5_a_flag:checked').removeAttr('checked');
        $('.i_5_5_a_value').attr('disabled', 'disabled');
        $('.i_5_5_a_flag').attr('disabled', 'disabled');
        $('.i_5_5_a_value').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_5_b').val('');
        $('.i_5_5_b').attr('disabled', 'disabled');
        $('.i_5_5_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_6_a').val('');
        $('.i_5_6_a').attr('disabled', 'disabled');
        $('.i_5_6_a').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_6_b').val('');
        $('.i_5_6_b').attr('disabled', 'disabled');
        $('.i_5_6_b').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_6_c_flag').val('');
        $('.i_5_6_c_flag').attr('disabled', 'disabled');
        $('.i_5_6_c_flag').parent().parent().attr('style', 'color:#a6a6a6');

        $('.i_5_6_c_value').val('');
        $('.i_5_6_c_value').attr('disabled', 'disabled');
        $('.i_5_6_c_value').parent().parent().attr('style', 'color:#a6a6a6');
    }
}

var substringMatcher = function (strs) {
    return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp("^("+q+")", 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function (i, str) {
            if (substrRegex.test(str)) {
                matches.push(str);
            }
        });

        cb(matches);
    };
};

var thanas = ['Adabor', 'Azampur', 'Badda', 'Banani', 'Bangsal', 'Bimanbandar', 'Cantonment', 'Chowkbazar', 'Dakshin Khan', 'Darus Salam', 'Demra', 'Dhanmondi', 'Gendaria', 'Gulshan', 'Hazaribagh', 'Jatrabari', 'Kadamtali', 'Kafrul', 'Kalabagan', 'Kamrangirchar', 'Khilgaon', 'Khilkhet', 'Kotwali', 'Lalbagh', 'Mirpur', 'Mohammadpur', 'Motijheel', 'Mugda', 'New Market', 'Pallabi', 'Paltan', 'Panthapath', 'Ramna', 'Rampura', 'Rupnagar', 'Sabujbagh', 'Shah Ali', 'Shahjahanpur', 'Shahbagh', 'Sher-e-Bangla Nagar', 'Shyampur', 'Sutrapur', 'Tejgaon Industrial Area', 'Tejgaon', 'Turag', 'Uttar Khan', 'Uttara East', 'Uttara West', 'Bsahantek', 'Vatara', 'Wari'];
var areas = ['Adabor', 'Azampur', 'Badda', 'Banani', 'Bangsal', 'Bimanbandar', 'Cantonment', 'Chowkbazar', 'Dakshin Khan', 'Darus Salam', 'Demra', 'Dhanmondi', 'Gendaria', 'Gulshan', 'Hazaribagh', 'Jatrabari', 'Kadamtali', 'Kafrul', 'Kalabagan', 'Kamrangirchar', 'Khilgaon', 'Khilkhet', 'Kotwali', 'Lalbagh', 'Mirpur', 'Mohammadpur', 'Motijheel', 'Mugda', 'New Market', 'Pallabi', 'Paltan', 'Panthapath', 'Ramna', 'Rampura', 'Rupnagar', 'Sabujbagh', 'Shah Ali', 'Shahjahanpur', 'Shahbagh', 'Sher-e-Bangla Nagar', 'Shyampur', 'Sutrapur', 'Tejgaon Industrial Area', 'Tejgaon', 'Turag', 'Uttar Khan', 'Uttara East', 'Uttara West', 'Bsahantek', 'Vatara', 'Wari'];
var markets = ['Middle badda bazar', 'Modhya badda bazar', 'Moddha Badda Wet Market', 'Uttar badda bazar', 'Alir more bazar', 'Alim bazar', 'Rahmatullah Garments bazar', 'Panchtola bazar', 'Pach Tola Bazar', 'Mohakhali Kacha bazar', 'Banani kacha bazar', 'Banani community kacha bazar', 'Wireless kacha bazar', 'Warelase Kacha Bazar', 'Arjotpara kacha bazar', 'Ajampur kacha bazar', ' 6 no section Uttara Ajampur wet market', 'Dakkhin Khilkhet bazar', 'Khilkhet bazar', 'South khilkhet market', 'Puraton bazar', 'Lakecity bazar', 'Khilgaon kacha bazar-1', 'Khilgaon bazar', 'Gopibag bazar', 'Sipahibazar market', 'Gulshan-1 kacha bazar', 'Gulshan-2 kacha bazar', 'Agargaon notun bazar', 'Agargaon bazar', 'Boro bazar', 'Gabtoli boro bazar', 'Gabtoli', 'Gaidartek Bazar', 'Goidertek Bazar', 'Lalkuthi Bazar', 'Lalkuthi', 'Hazrat Shah Ali City corporation Market', 'Shah Ali shriti market', 'Shah Ali market', 'Mirpur Bazar', 'Mirpur-1 Shah Ali MarketBorobag wet market', 'Borobag bazar', 'Mirpur-2 wet market', 'Borobug wet market', 'Kollyanpur notun bazar', 'Kollyanpur bazar', 'New Nazar ', 'kallyanpur natun Bazar', 'Darussalam kacha bazar', 'Ahmednagor Paickpara Bazar', 'Darussalam wet market ', 'Mirpur 10 kacha bazar', 'mirpur-10 wet market', 'Muslimbazar kacha bazar', 'Muslim bazar wet market', 'Mirpur-1 Kacha bazar', 'Palpara bazar', 'Baoniabad Bazar', 'Baonia Bazar', 'Ibrahimpur kacha bazar', 'Ibrahimpur bazar', 'Ibrahimpur wet market', 'Mirpur 11 kacha bazar', 'new society bazar', 'mirpur-11 wet market', 'Mirpur 12 kacha bazar', 'Mirpur-12 wet market', 'Masjid market', 'Mirpur-6 Masjid market', 'New Society market', 'New Society Market Mirpur-1', 'Muslim bazar', 'Kalshi baishtola bazar', '6 number bazar', 'Ali Market', 'Amtoli Bazar', 'Amtola Bazar', 'Kazipara Masjid Market', 'Kazipara bazar', 'Kazipara wet market', 'Fakir Bari Market', 'Fakir bari', 'Rojonigandha supermarket', 'Kochukhet Cantonnement Market', 'Rupnagar kacha bazar', 'Rupnagar wet market', 'BDR market', 'BDR shop', 'Bihari camp', 'Geneva camp market', 'Town hall bazar', 'Town hall city corporation market', 'Mohammadpur kacha bazar', 'Mohammadpur Krishi Market', 'Mohammadpur Krishi ponnyo bazar', 'Mohammadpur new kacha bazar', 'Shyamoli ring road market', 'Katashur bazar', 'Kawranbazar chicken & duck market', 'Kawranbazar kacha bazar', 'Kawran bazar', 'Tejgaon ratail chicken market', 'Tejgaon kacha bazar', 'Farmgate 40 no. word comissioner market', 'Bonosree kacha bazar', 'Banasree Wet Market', 'Dakkhin bonosree kacha bazar', 'South banasree market', 'Sepahibag bazar', 'Sipahibazar', 'Gorain sepahibag bazar', 'Gorain Sapaibag bazar', 'Khilgaon taltola kacha bazar', 'Khilgaon bazar', 'Meradia kacha bazar', 'Meradiahat bazar', 'Mera Diraihat Bazar', 'Miradia Bazar', 'Rampura bazar', 'Malibag railgate market', 'Malibag kacha bazar', 'Malibag wet market', 'Mogbazar kacha bazar', 'Mogbazar wet market', 'Segunbagicha bazar', 'Segunbagicha bazar', 'Shantibag bazar', 'Shantibug market', 'Hatirpool bazar', 'Hatirpul kacha market', 'Kathalbagan bazar', 'Sukrabad bazar', 'New market', 'City corporation new market', 'Zigatola market', 'Zigatala market', 'Jigatala market', 'Hazaribag kacha bazar', 'Rayerbazar pouro market', 'Rayerbazar market', 'Salek garden bazar', 'Salek Garden', 'Azimpur bottola market', 'Kellar mor bazar', 'Polashi bazar', '1 no polashi market', '2 no polashi market', 'Nawab Yousuf Ali Kacha Bazar', 'Noya bazar', 'Nawab Yousuf kacha marke', 'Anando bazar', 'Ananda bazar', 'Dholaipar kacha bazar', 'Dolaipar wet market', 'Kaptan bazar', 'Thatari bazar', 'Badamtoli kachabazar', 'Bokshibazar kacha bazar', 'Bakshibazar', 'Chandrima super market', 'Bonolata kacha bazar', 'Nimtoli market', 'Anondo bazar', 'Bangladesh bank bazar', 'Fakirapul chicken market', 'Hazi Younus super market', 'Hazi Unus supermarket', 'Jatrabari Hazi Younous supermarket', 'Komlapur kacha bazar', 'Kamlapur wet market', 'Motijheel kacha bazar', 'Morijheel wet market', 'Mugda kacha bazar', 'Mugda wet market', 'Nazira bazar', 'Shantinagar bazar', 'BGB bazar', 'Bou bazar', 'Faridabad bank colony', 'Poddar bazar', 'Kudrat Ali kacha bazar', 'Mowlovi bazar', 'Rai saheb bazar', 'Shyam bazar', 'Sham Bazar', 'Doyaganj bazar', 'Dayagonj bazar ', 'Doyaganj wari (swiper colony) market', 'Jatrabari chowrasta bazar', 'Jatrabari Cowrasta bazar', 'Chourasta', 'Jatrabari wholesale market', 'Sayednagar bazar', 'Shaidnagor Bazar', 'Abuhazi Kazi bazar', 'Ghantighar bazar', 'Jurain railgate bazar', 'Pokar bazar', 'Dhalpur kacha bazar', 'Dhalpur wet market', 'Dhupkhola bazar', 'Dhupkhula bazar', 'Mirror shaheb kacha bazar', 'Miror Shahib Wet Market', 'Shahidnagar kacha bazar', 'Shahidnagar wet market', 'Sutrapur bazar', 'Sutrapur kacha', 'Paka Market', 'Lokkhibazar market', 'Kodu bazar', 'Lakshmi Bazar', 'Nakhalpara kacha bazar', 'Chapra mosque market', 'Nuiracala bazar', 'Korail kacha bazar', 'Anondonagor bazar', 'Borotek bazar', 'Dakkhin/south goran bazar', 'Duaripara bazar', '7 no. kacha bazar', 'Kala pani bazar', 'Kulpar kacha bazar', 'Lawtola kacha bazar', 'Akota kacha bazar', 'Maniknagar kacha bazar', '14 no. tin shed bazar', '13 no. bazar', 'Rampura bazar', 'Farmgate kacha bazar', 'Nandipara kacha bazar', 'Basabo kacha bazar', 'Kamar Para Notun Bazar', 'Kamar Para Market', 'Kamar para bazar ', 'Raza Bari', 'Dhorongartek', 'Dhoratek', 'Hazi Kalu Mia kacha Bazar', 'Gulgular  Bazar ', 'Siraj Market', 'Chairman Market', 'Kamrul Market', 'Dia Bari Bazar', 'Hazi Market', 'South Raza Bari Bazar', 'Hosen Mia Market', 'North Raza Bari', 'Siraj Market', 'Bottola Market'];
$('.the-basics-thana .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
},
    {
        name: 'thanas',
        source: substringMatcher(thanas)
    });
$('.the-basics-area .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
},
    {
        name: 'areas',
        source: substringMatcher(areas)
    });
$('.the-basics-market .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
},
    {
        name: 'markets',
        source: substringMatcher(markets)
    });
$('.the-basics-thana').change(function () {
    if ($.inArray($(this).children(0).children().next("input").val(), thanas) == -1) {
        $(this).next("input").trigger("click");
    } else {
        $(this).next("input").removeAttr("checked");
    }
});
$('.the-basics-market').change(function () {
    if ($.inArray($(this).children(0).children().next("input").val(), markets) == -1) {
        $(this).next("input").trigger("click");
    } else {
        $(this).next("input").removeAttr("checked");
    }
});
$('.the-basics-area').change(function () {
    if ($.inArray($(this).children(0).children().next("input").val(), areas) == -1) {
        $(this).next("input").trigger("click");
    } else {
        $(this).next("input").removeAttr("checked");
    }
});


$(document).ready(function () {
    ///start on init
    setTimeout(function () {
        if ($("#call_status").val() == "0") {
            $("#date").removeAttr("disabled");
            $("#time").removeAttr("disabled");
        } else {
            $("#date").attr('disabled', 'disabled');
            $("#time").attr('disabled', 'disabled');
        }


        if ($('#s_0_2').val() > 17) {
            $('.s_0_3').removeAttr("disabled");
            $('.s_0_3').parent().parent().removeAttr('style');
            $('.s_0_3:first-child').focus();
        }
        if ($('.s_0_3:checked').val() == 1) {
            $('.s_0_4').removeAttr("disabled");
            $('.s_0_4').parent().parent().removeAttr('style');
            $('.s_0_4:first-child').focus();
        }
        if ($('.s_0_4:checked').val() == 1) {
            $('.sc_0_1').removeAttr("disabled");
            $('.sc_0_1').parent().parent().removeAttr('style');
            $('.sc_0_1:first-child').focus();
        }

        if ($('.sc_0_1:checked').val() == 1) {
            $('.gi_1_1').removeAttr("disabled");
            $('.gi_1_1').parent().parent().removeAttr('style');
            $('.gi_1_1:first-child').focus();
        }
        if ($('.sc_0_1:checked').val() != "" && $('.sc_0_1:checked').val() !== undefined) {

            if ($('.sc_0_1:checked').val() == 1) {
                $('#gi_1_2_a_value').removeAttr("disabled");
                $('.gi_1_2_a_flag').removeAttr("disabled");
                $('#gi_1_2_a_value').parent().parent().parent().removeAttr('style');
                $('#gi_1_2_a_value').parent().parent().parent().parent().removeAttr('style');
                $('#gi_1_2_a_value').focus();
            }
        }
        if ($('.gi_1_1:checked').val() != "" && $('.gi_1_1:checked').val() !== undefined) {

                var mobile_surveillance = {
                    '017': [243, 243],
                    '013': [243, 243],
                    '019': [112, 112],
                    '014': [112, 112],
                    '018': [155, 155],
                    '016': [155, 155],
                    '015': [13, 13]
                };
                var location = window.location.pathname.replace(/^\//g, '').split("/");
                var mobile = $('.surveillance-data div strong').html();
                var gender = $('.gi_1_1:checked').val();
                var noofgender = 0;
                $.ajax({
                    method: "get",
                    async:false,
                    url: window.location.protocol + "//" + window.location.hostname + "/" + location[0] + "/" + location[1] + "/poultry/gender/" + mobile.substring(0, 3) + "/" + gender,
                }).success(function (msg) {
                    noofgender = msg;
                });
                if (noofgender >= mobile_surveillance[mobile.substring(0, 3)][gender - 1]) {
                    if (confirm("নির্বাচিত অপারেটর এর লিঙ্গের সীমা অতিক্রম করেছে (সর্বমোটঃ"+noofgender+")। সাক্ষাৎকার প্রদানের জন্য আপনাকে ধন্যবাদ।")) {
                        $("#call_status").append('<option value="2" selected="selected">ineligible</option>');
                        data_upload(true);
                    }
                } else {
                    $('#gi_1_2_a_value').removeAttr("disabled");
                    $('.gi_1_2_a_flag').removeAttr("disabled");
                    $('#gi_1_2_a_value').parent().parent().parent().removeAttr('style');
                    $('#gi_1_2_a_value').parent().parent().parent().parent().removeAttr('style');
                    $('#gi_1_2_a_value').focus();
                }
        }
        if ($('#gi_1_2_a_value').val() != "") {
            $('#gi_1_2_b_value').removeAttr("disabled");
            $('.gi_1_2_b_flag').removeAttr("disabled");
            $('#gi_1_2_b_value').parent().parent().parent().parent().removeAttr('style');
            $('#gi_1_2_b_value').parent().parent().parent().removeAttr('style');
            $('#gi_1_2_b_value').focus();

        }
        if ($('.gi_1_2_a_flag:checked').val() != "" && $('.gi_1_2_a_flag:checked').val() !== undefined) {
            $('#gi_1_2_b_value').removeAttr("disabled");
            $('.gi_1_2_b_flag').removeAttr("disabled");
            $('#gi_1_2_b_value').parent().parent().parent().parent().removeAttr('style');
            $('#gi_1_2_b_value').parent().parent().parent().removeAttr('style');
            $('#gi_1_2_b_value').focus();

        }
        if ($('#gi_1_2_b_value').val() != "") {

            $('.pp_2_1_a').removeAttr("disabled");
            $('.pp_2_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');

        }
        if ($('.gi_1_2_b_flag:checked').val() != "" && $('.gi_1_2_b_flag:checked').val() !== undefined) {
            $('.pp_2_1_a').removeAttr("disabled");
            $('.pp_2_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
        setTimeout(function () {
            if ($('.pp_2_1_a:checked').val() != "" && $('.pp_2_1_a:checked').val() !== undefined) {
                if ($('.pp_2_1_a:checked').val() != 1) {
                    $('.pp_2_15_a').removeAttr("disabled");
                    $('.pp_2_15_a').parent().parent().removeAttr('style');
                    $('.pp_2_15_a:first-child').focus();
                } else {
                    $('#pp_2_1_b_flag').removeAttr("disabled");
                    $('#pp_2_1_b_flag').parent().parent().removeAttr('style');
                    $('#pp_2_1_b_flag').focus();
                }
            }
            if ($('#pp_2_1_b_flag').val() != "") {
                if ($('#pp_2_1_b_flag').val() == 77) {
                    $('#pp_2_1_b_value').removeAttr("disabled");
                    $('#pp_2_1_b_value').focus();
                } else {
                    $('#pp_2_2_value').removeAttr("disabled");
                    $('.pp_2_2_flag').removeAttr("disabled");
                    $('#pp_2_2_value').parent().parent().parent().parent().removeAttr('style');
                    $('#pp_2_2_value').parent().parent().parent().removeAttr('style');
                    $('#pp_2_2_value').focus();

                    $('#pp_2_1_b_value').val("");
                    $('#pp_2_1_b_value').attr("disabled", "disabled");
                }
            }
            if ($('#pp_2_1_b_value').val() != "") {
                $('#pp_2_2_value').removeAttr("disabled");
                $('.pp_2_2_flag').removeAttr("disabled");
                $('#pp_2_2_value').parent().parent().parent().parent().removeAttr('style');
                $('#pp_2_2_value').parent().parent().parent().removeAttr('style');
                $('#pp_2_2_value').focus();
            }
            if ($('#pp_2_2_value').val() != "") {
                $('.pp_2_3_a').removeAttr("disabled");
                $('.pp_2_3_a').parent().parent().removeAttr('style');
                $('.pp_2_3_a:first-child').focus();

            }
            if ($('.pp_2_2_flag:checked').val() != "" && $('.pp_2_2_flag:checked').val() !== undefined) {
                $('.pp_2_3_a').removeAttr("disabled");
                $('.pp_2_3_a').parent().parent().removeAttr('style');
                $('.pp_2_3_a:first-child').focus();
            }
            if ($('.pp_2_3_a:checked').val() != "" && $('.pp_2_3_a:checked').val() !== undefined) {
                if ($('.pp_2_3_a:checked').val() != 1) {

                    $('#pp_2_3_b_value').val("");
                    $('#pp_2_3_b_value').attr("disabled", "disabled");
                    $('.pp_2_3_b_flag').attr("disabled", "disabled");
                    $('#pp_2_3_b_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

                    $('#pp_2_4_value').removeAttr("disabled");
                    $('.pp_2_4_flag').removeAttr("disabled");
                    $('#pp_2_4_value').parent().parent().parent().parent().removeAttr('style');
                    $('#pp_2_4_value').parent().parent().parent().removeAttr('style');
                    $('#pp_2_4_value').focus();
                } else {
                    $('#pp_2_3_b_value').removeAttr("disabled");
                    $('.pp_2_3_b_flag').removeAttr("disabled");
                    $('#pp_2_3_b_value').parent().parent().parent().parent().removeAttr('style');
                    $('#pp_2_3_b_value').parent().parent().parent().removeAttr('style');
                    $('#pp_2_3_b_value').focus();
                }
            }
            if ($('#pp_2_3_b_value').val() != "") {
                $('#pp_2_4_value').removeAttr("disabled");
                $('.pp_2_4_flag').removeAttr("disabled");
                $('#pp_2_4_value').parent().parent().parent().parent().removeAttr('style');
                $('#pp_2_4_value').parent().parent().parent().removeAttr('style');
                $('#pp_2_4_value').focus();
            }
            if ($('.pp_2_3_b_flag:checked').val() != "" && $('.pp_2_3_b_flag:checked').val() !== undefined) {
                $('#pp_2_4_value').removeAttr("disabled");
                $('.pp_2_4_flag').removeAttr("disabled");
                $('#pp_2_4_value').parent().parent().parent().parent().removeAttr('style');
                $('#pp_2_4_value').parent().parent().parent().removeAttr('style');
                $('#pp_2_4_value').focus();
            }
            if ($('#pp_2_4_value').val() != "") {
                $('#pp_2_5_value').removeAttr("disabled");
                $('.pp_2_5_flag').removeAttr("disabled");
                $('#pp_2_5_value').parent().parent().removeAttr('style');
                $('#pp_2_5_value').focus();
            }
            if ($('.pp_2_4_flag:checked').val() != "" && $('.pp_2_4_flag:checked').val() !== undefined) {
                $('#pp_2_5_value').removeAttr("disabled");
                $('.pp_2_5_flag').removeAttr("disabled");
                $('#pp_2_5_value').parent().parent().removeAttr('style');
                $('#pp_2_5_value').focus();
            }
            if ($('#pp_2_5_value').val() != "") {
                $('.pp_2_6_a').removeAttr("disabled");
                $('.pp_2_6_a').parent().parent().removeAttr('style');
                $('.pp_2_6_a:first-child').focus();
            }
            if ($('.pp_2_5_flag:checked').val() != "" && $('.pp_2_5_flag:checked').val() !== undefined) {
                $('.pp_2_6_a').removeAttr("disabled");
                $('.pp_2_6_a').parent().parent().removeAttr('style');
                $('.pp_2_6_a:first-child').focus();
            }
            if ($('.pp_2_6_a:checked').val() != "" && $('.pp_2_6_a:checked').val() !== undefined) {
                if ($('.pp_2_6_a:checked').val() != 1) {
                    $('#pp_2_7_a_value').removeAttr("disabled");
                    $('.pp_2_7_a_flag').removeAttr("disabled");
                    $('#pp_2_7_a_value').parent().parent().removeAttr('style');
                    $('#pp_2_7_a_value').focus();
                    $('#pp_2_6_b').val("")
                    $('#pp_2_6_b').attr("disabled", "disabled");
                    $('#pp_2_6_b').parent().parent().attr('style', 'color:#a6a6a6');
                } else {
                    $('#pp_2_6_b').removeAttr("disabled");
                    $('#pp_2_6_b').parent().parent().removeAttr('style');
                    $('#pp_2_6_b').focus();
                }
            }

            if ($('.pp_2_6_b:first-child').val() != "") {

                $('.pp_2_6_b').next().removeAttr("disabled");
                $('#pp_2_7_a_value').removeAttr("disabled");
                $('.pp_2_7_a_flag').removeAttr("disabled");
                $('#pp_2_7_a_value').parent().parent().removeAttr('style');
                $('#pp_2_7_a_value').focus();
            }
            if ($('#pp_2_7_a_value').val() != "") {

                $('.pp_2_7_b').removeAttr("disabled");
                $('.pp_2_7_b').parent().parent().removeAttr('style');
                $('.pp_2_7_b:first-child').focus();
            }
            if ($('.pp_2_7_a_flag:checked').val() != "" && $('.pp_2_7_a_flag:checked').val() !== undefined) {
                $('.pp_2_7_b').removeAttr("disabled");
                $('.pp_2_7_b').parent().parent().removeAttr('style');
                $('.pp_2_7_b:first-child').focus();
            }
            if ($('.pp_2_7_b:checked').val() != "" && $('.pp_2_7_b:checked').val() !== undefined) {
                if ($('.pp_2_7_b:checked').val() != 0) {
                    $('#pp_2_11_a').focus();
                    $('#pp_2_11_a').removeAttr("disabled");
                    $('#pp_2_11_a').parent().parent().removeAttr('style');
                    $('#pp_2_11_a').focus();
                    $('#pp_2_7_c_value').attr("disabled", "disabled");
                    $('.pp_2_7_c_flag').attr("disabled", "disabled");
                    $('#pp_2_7_c_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');
                } else {
                    $('#pp_2_7_c_value').removeAttr("disabled");
                    $('.pp_2_7_c_flag').removeAttr("disabled");
                    $('#pp_2_7_c_value').parent().parent().parent().parent().removeAttr('style');
                    $('#pp_2_7_c_value').parent().parent().parent().removeAttr('style');
                    $('#pp_2_7_c_value').focus();
                }
            }
            if ($('#pp_2_7_c_value').val() != "") {
                $('.pp_2_8_a').removeAttr("disabled");
                $('.pp_2_8_a').parent().parent().removeAttr('style');
                $('.pp_2_8_a:first-child').focus();
            }
            if ($('.pp_2_7_c_flag:checked').val() != "" && $('.pp_2_7_c_flag:checked').val() !== undefined) {
                $('.pp_2_8_a').removeAttr("disabled");
                $('.pp_2_8_a').parent().parent().removeAttr('style');
                $('.pp_2_8_a').parent().parent().removeAttr('style');
                $('.pp_2_8_a:first-child').focus();
            }
            if ($('.pp_2_8_a:checked').val() != "" && $('.pp_2_8_a:checked').val() !== undefined) {
                if ($('.pp_2_8_a:checked').val() != 1) {
                    $('#pp_2_9_value').removeAttr("disabled");
                    $('.pp_2_9_flag').removeAttr("disabled");
                    $('#pp_2_9_value').parent().parent().parent().parent().removeAttr('style');
                    $('#pp_2_9_value').parent().parent().parent().removeAttr('style');
                    $('#pp_2_9_value').focus();
                } else {
                    $('#pp_2_8_b_value').removeAttr("disabled");
                    $('.pp_2_8_b_flag').removeAttr("disabled");
                    $('#pp_2_8_b_value').parent().parent().parent().removeAttr('style');
                    $('#pp_2_8_b_value').parent().parent().parent().parent().removeAttr('style');
                    $('#pp_2_8_b_value').focus();
                }
            }
            if ($('#pp_2_8_b_value').val() != "") {
                $('#pp_2_9_value').removeAttr("disabled");
                $('.pp_2_9_flag').removeAttr("disabled");
                $('#pp_2_9_value').parent().parent().parent().removeAttr('style');
                $('#pp_2_9_value').parent().parent().parent().parent().removeAttr('style');
                $('#pp_2_9_value').focus();
            }
            if ($('.pp_2_8_b_flag:checked').val() != "" && $('.pp_2_8_b_flag:checked').val() !== undefined) {
                $('#pp_2_9_value').removeAttr("disabled");
                $('.pp_2_9_flag').removeAttr("disabled");
                $('#pp_2_9_value').parent().parent().parent().parent().removeAttr('style');
                $('#pp_2_9_value').parent().parent().parent().removeAttr('style');
                $('#pp_2_9_value').focus();
            }
            if ($('#pp_2_9_value').val() != "") {
                $('#pp_2_10_value').removeAttr("disabled");
                $('.pp_2_10_flag').removeAttr("disabled");
                $('#pp_2_10_value').parent().parent().removeAttr('style');
                $('#pp_2_10_value').focus();
            }
            if ($('.pp_2_9_flag:checked').val() != "" && $('.pp_2_9_flag:checked').val() !== undefined) {
                $('#pp_2_10_value').removeAttr("disabled");
                $('.pp_2_10_flag').removeAttr("disabled");
                $('#pp_2_10_value').parent().parent().removeAttr('style');
                $('#pp_2_10_value').focus();
            }
            if ($('#pp_2_10_value').val() != "") {
                $('#pp_2_11_a').removeAttr("disabled");
                $('#pp_2_11_a').parent().parent().removeAttr('style');
                $('#pp_2_11_a').focus();
            }
            if ($('.pp_2_10_flag:checked').val() != "" && $('.pp_2_10_flag:checked').val() !== undefined) {
                $('#pp_2_11_a').removeAttr("disabled");
                $('#pp_2_11_a').parent().parent().removeAttr('style');
                $('#pp_2_11_a').focus();
            }
            if ($('#pp_2_11_a').val() != "") {
                $('#pp_2_11_b').removeAttr("disabled");
                $('#pp_2_11_b').parent().parent().removeAttr('style');
                $('#pp_2_11_b').focus();
            }
            if ($('#pp_2_11_b').val() != "") {
                $('#pp_2_11_c').removeAttr("disabled");
                $('#pp_2_11_c').parent().parent().removeAttr('style');
                $('#pp_2_11_c').focus();
            }
            if ($('#pp_2_11_c').val() != "") {
                $('#pp_2_11_d').removeAttr("disabled");
                $('#pp_2_11_d').parent().parent().removeAttr('style');
                $('#pp_2_11_d').focus();
            }
            if ($('#pp_2_11_d').val() != "") {
                $('.pp_2_12_a').removeAttr("disabled");
                $('.pp_2_12_a').parent().parent().removeAttr('style');
                $('.pp_2_12_a:first-child').focus();
            }
            if ($('.pp_2_12_a:checked').val() != "" && $('.pp_2_12_a:checked').val() !== undefined) {
                if ($('.pp_2_12_a:checked').val() != 1) {
                    $('.pp_2_13_a').removeAttr("disabled");
                    $('.pp_2_13_a').parent().parent().removeAttr('style');
                    $('.pp_2_13_a:first-child').focus();
                } else {
                    $('#pp_2_12_b').removeAttr("disabled");
                    $('#pp_2_12_b').parent().parent().removeAttr('style');
                    $('#pp_2_12_b').focus();
                }
            }
            if ($('#pp_2_12_b').val() != "") {
                $('.pp_2_13_a').removeAttr("disabled");
                $('.pp_2_13_a').parent().parent().removeAttr('style');
                $('.pp_2_13_a:first-child').focus();
            }
            if ($('.pp_2_13_a:checked').val() != "" && $('.pp_2_13_a:checked').val() !== undefined) {
                if ($('.pp_2_13_a:checked').val() != 1) {
                    $('#pp_2_14_a_flag').removeAttr("disabled");
                    $('#pp_2_14_a_flag').parent().parent().removeAttr('style');
                    $('#pp_2_14_a_flag').focus();
                } else {
                    $('#pp_2_13_b').removeAttr("disabled");
                    $('#pp_2_13_b').parent().parent().removeAttr('style');
                    $('#pp_2_13_b').focus();
                }
            }
            if ($('#pp_2_13_b').val() != "") {
                $('#pp_2_14_a_flag').removeAttr("disabled");
                $('#pp_2_14_a_flag').parent().parent().removeAttr('style');
                $('#pp_2_14_a_flag').focus();
            }
            if ($('#pp_2_14_a_flag').val() != "") {
                if ($('#pp_2_14_a_flag').val() == 77) {
                    $('#pp_2_14_a_value').removeAttr("disabled");
                    $('#pp_2_14_a_value').focus();
                }
                else if ($('#pp_2_14_a_flag').val() == 2 || $('#pp_2_14_a_flag').val() == 88 || $('#pp_2_14_a_flag').val() == 99) {
                    $('#pp_2_14_a_value').attr("disabled", "disabled");
                    $('.pfp_3_1_a').removeAttr("disabled");
                    $('.pfp_3_1_a').parent().parent().removeAttr('style');
                    $('.wizard-next').trigger('click');
                    // goto section 3//$('#pp_2_14_a').focus();
                } else {
                    $('#pp_2_14_a_value').attr("disabled", "disabled");
                    $('#pp_2_14_b_flag').removeAttr("disabled");
                    $('#pp_2_14_b_flag').parent().parent().removeAttr('style');
                    $('#pp_2_14_b_flag').focus();
                }
            }
            if ($('#pp_2_14_a_value').val() != "") {
                $('.pfp_3_1_a').removeAttr("disabled");
                $('.pfp_3_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
            if ($('#pp_2_14_b_flag').val() != "") {
                if ($('#pp_2_14_b_flag').val() == 77) {
                    $('#pp_2_14_b_value').removeAttr("disabled");
                    $('#pp_2_14_b_value').focus();
                } else if ($('.pp_2_1_a:checked').val() == 0) {
                    $('#pp_2_14_b_value').val("");
                    $('#pp_2_14_b_value').attr("disabled", "disabled");
                    $('.pp_2_15_a').removeAttr("disabled");
                    $('.pp_2_15_a').parent().parent().removeAttr('style');
                    $('.pp_2_15_a:first-child').focus();
                } else {
                    $('.pfp_3_1_a').removeAttr("disabled");
                    $('.pfp_3_1_a').parent().parent().removeAttr('style');
                    $('.wizard-next').trigger('click');
                }
            }
            if ($('#pp_2_14_b_value').val() != "") {
                if ($('.pp_2_1_a:checked').val() == 0) {
                    $('.pp_2_15_a').removeAttr("disabled");
                    $('.pp_2_15_a').parent().parent().removeAttr('style');
                    $('.pp_2_15_a:first-child').focus();
                } else {
                    $('.pfp_3_1_a').removeAttr("disabled");
                    $('.pfp_3_1_a').parent().parent().removeAttr('style');
                    $('.wizard-next').trigger('click');
                }

            }
            if ($('.pp_2_15_a:checked').val() != "" && $('.pp_2_15_a:checked').val() !== undefined) {
                if ($('.pp_2_15_a:checked').val() == 1) {
                    $('#pp_2_15_b').removeAttr("disabled");
                    $('#pp_2_15_b').parent().parent().removeAttr('style');
                    $('#pp_2_15_b:first-child').focus();
                } else {
                    $('#pp_2_16_a_flag').removeAttr("disabled");
                    $('#pp_2_16_a_flag').parent().parent().removeAttr('style');
                    $('#pp_2_16_a_flag').focus();
                }
            }
            if ($('.pp_2_15_b:first-child').val() != "") {
                $('.pp_2_15_b').next().removeAttr("disabled");
                $('.pp_2_15_c_flag').removeAttr("disabled");
                $('#pp_2_15_c_flag').parent().parent().removeAttr('style');
                $('#pp_2_15_c_flag').focus();
            }
            if ($('.pp_2_15_c_flag:first-child').val() != "") {
                $('.pp_2_15_c_flag').removeAttr("disabled");
                if ($('.pp_2_15_c_flag:first-child').val() == 77) {
                    $('.pp_2_15_c_flag:first-child').next().removeAttr("disabled");
                    $('.pp_2_15_c_flag:first-child').next().focus();
                } else {
                    $('.pfp_3_1_a').removeAttr("disabled");
                    $('.pfp_3_1_a').parent().parent().removeAttr('style');
                    ///$('.wizard-next').trigger('click');
                }
            }
            if ($('.pp_2_15_c_value:checked').val() != "" && $('.pp_2_15_c_value:checked').val() !== undefined) {
                $('.pfp_3_1_a').removeAttr("disabled");
                $('.pfp_3_1_a').parent().parent().removeAttr('style');
                // $('.wizard-next').trigger('click');
            }
            if ($('#pp_2_16_a_flag').val() != "") {
                if ($('#pp_2_16_a_flag').val() == 77) {
                    $('#pp_2_16_a_value').removeAttr("disabled");
                    $('#pp_2_16_a_value').focus();
                }else if ($('#pp_2_16_a_flag').val() == 1) {
                    $('#pp_2_16_b_flag').removeAttr("disabled");
                    $('#pp_2_16_b_flag').parent().parent().removeAttr('style');
                    $('#pp_2_16_b_flag:first-child').focus();
                } else {
                    $('.pfp_3_1_a').removeAttr("disabled");
                    $('.pfp_3_1_a').parent().parent().removeAttr('style');
                    $('.wizard-next').trigger('click');
                }
            }
            if ($('#pp_2_16_a_value').val() != "") {
                $('.pfp_3_1_a').removeAttr("disabled");
                $('.pfp_3_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
            if ($('#pp_2_16_b_flag').val() != "") {
                if ($('#pp_2_16_b_flag').val() == 77) {
                    $('#pp_2_16_b_value').removeAttr("disabled");
                    $('#pp_2_16_b_value').focus();
                } else {
                    $('#pp_2_16_b_value').attr("disabled", "disabled");
                    $('.pfp_3_1_a').removeAttr("disabled");
                    $('.pfp_3_1_a').parent().parent().removeAttr('style');
                    $('.wizard-next').trigger('click');
                }
            }
            if ($('#pp_2_16_b_value').val() != "") {
                $('.pfp_3_1_a').removeAttr("disabled");
                $('.pfp_3_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
            setTimeout(function () {
                if ($('.pfp_3_1_a:checked').val() != "" && $('.pfp_3_1_a:checked').val() !== undefined) {
                    if ($('.pfp_3_1_a:checked').val() == 1) {
                        $('.pfp_3_1_b').removeAttr("disabled");
                        $('.pfp_3_1_b').parent().parent().removeAttr('style');
                        $('.pfp_3_1_b:first-child').focus();
                    } else {
                        if ($('#pp_2_14_a_flag').val() == 1) {
                            $('.pfp_3_1_d').removeAttr("disabled");
                            $('.pfp_3_1_d').parent().parent().removeAttr('style');
                            $('.pfp_3_1_d:first-child').focus();
                        } else {
                            $('.pfp_3_2_a').removeAttr("disabled");
                            $('.pfp_3_2_a').parent().parent().removeAttr('style');
                            $('.pfp_3_2_a:first-child').focus();
                        }
                    }
                }
                if ($('.pfp_3_1_b:checked').val() != "" && $('.pfp_3_1_b:checked').val() !== undefined) {
                    if ($('.pfp_3_1_b:checked').val() == 1) {
                        $('#pfp_3_1_c').removeAttr("disabled");
                        $('#pfp_3_1_c').parent().parent().removeAttr('style');
                        $('#pfp_3_1_c').focus();
                    } else {
                        $('.pfp_3_2_a').removeAttr("disabled");
                        $('.pfp_3_2_a').parent().parent().removeAttr('style');
                        $('.pfp_3_2_a:first-child').focus();
                    }
                }
                if ($('.pfp_3_1_c:first-child').val() != "") {
                    $('.pfp_3_1_c').next().removeAttr("disabled");
                    if ($('#pp_2_14_a_flag').val() == 1) {
                        $('.pfp_3_1_d').removeAttr("disabled");
                        $('.pfp_3_1_d').parent().parent().removeAttr('style');
                        $('.pfp_3_1_d:first-child').focus();
                    } else {
                        $('.pfp_3_2_a').removeAttr("disabled");
                        $('.pfp_3_2_a').parent().parent().removeAttr('style');
                        $('.pfp_3_2_a:first-child').focus();
                    }
                }
                if ($('.pfp_3_1_d:checked').val() != "" && $('.pfp_3_1_d:checked').val() !== undefined) {
                    $('.pfp_3_2_a').removeAttr("disabled");
                    $('.pfp_3_2_a').parent().parent().removeAttr('style');
                    $('.pfp_3_2_a:first-child').focus();
                }
                if ($('.pfp_3_2_a:checked').val() != "" && $('.pfp_3_2_a:checked').val() !== undefined) {
                    if ($('.pfp_3_2_a:checked').val() == 1) {
                        $('#pfp_3_2_b_flag').removeAttr("disabled");
                        $('#pfp_3_2_b_flag').parent().parent().removeAttr('style');
                        $('#pfp_3_2_b_flag').focus();
                    } else {
                        if ($('#pp_2_14_a_flag').val() == 1) {
                            $('.pfp_3_2_e').removeAttr("disabled");
                            $('.pfp_3_2_e').parent().parent().removeAttr('style');
                            $('.pfp_3_2_e:first-child').focus();
                        } else {
                            $('.pfp_3_3_a').removeAttr("disabled");
                            $('.pfp_3_3_a').parent().parent().removeAttr('style');
                            $('.pfp_3_3_a:first-child').focus();
                        }
                    }
                }
                if ($('#pfp_3_2_b_flag').val() != "") {
                    if ($('#pfp_3_2_b_flag').val() == 77) {
                        $('#pfp_3_2_b_value').removeAttr("disabled");
                        $('#pfp_3_2_b_value').focus();
                    } else {
                        $('.pfp_3_2_c').removeAttr("disabled");
                        $('.pfp_3_2_c').parent().parent().removeAttr('style');
                        $('.pfp_3_2_c:first-child').focus();
                    }
                }
                if ($('#pfp_3_2_b_value').val() != "") {
                    $('.pfp_3_2_c').removeAttr("disabled");
                    $('.pfp_3_2_c').parent().parent().removeAttr('style');
                    $('.pfp_3_2_c:first-child').focus();
                }

                if ($('.pfp_3_2_c:checked').val() != "" && $('.pfp_3_2_c:checked').val() !== undefined) {
                    if ($('.pfp_3_2_c:checked').val() == 1) {
                        $('#pfp_3_2_d').removeAttr("disabled");
                        $('#pfp_3_2_d').parent().parent().removeAttr('style');
                        $('#pfp_3_2_d').focus();
                    } else {
                        $('.pfp_3_3_a').removeAttr("disabled");
                        $('.pfp_3_3_a').parent().parent().removeAttr('style');
                        $('.pfp_3_3_a:first-child').focus();
                    }
                }
                if ($('.pfp_3_2_d:first-child').val() != "") {
                    $('.pfp_3_2_d').next().removeAttr("disabled");
                    if ($('#pp_2_14_a_flag').val() == 1) {
                        $('.pfp_3_2_e').removeAttr("disabled");
                        $('.pfp_3_2_e').parent().parent().removeAttr('style');
                        $('.pfp_3_2_e:first-child').focus();
                    } else {
                        $('.pfp_3_3_a').removeAttr("disabled");
                        $('.pfp_3_3_a').parent().parent().removeAttr('style');
                        $('.pfp_3_3_a:first-child').focus();
                    }
                }
                if ($('.pfp_3_2_e:checked').val() != "" && $('.pfp_3_2_e:checked').val() !== undefined) {
                    if ($('.pfp_3_2_e:checked').val() == 1) {
                        $('#pfp_3_2_f_flag').removeAttr("disabled");
                        $('#pfp_3_2_f_flag').parent().parent().removeAttr('style');
                        $('#pfp_3_2_f_flag').focus();
                    } else {
                        $('.pfp_3_3_a').removeAttr("disabled");
                        $('.pfp_3_3_a').parent().parent().removeAttr('style');
                        $('.pfp_3_3_a:first-child').focus();
                    }
                }
                if ($('#pfp_3_2_f_flag').val() != "") {
                    if ($('#pfp_3_2_f_flag').val() == 77) {
                        $('#pfp_3_2_f_value').removeAttr("disabled");
                        $('#pfp_3_2_f_value').focus();
                    } else {
                        $('.pfp_3_3_a').removeAttr("disabled");
                        $('.pfp_3_3_a').parent().parent().removeAttr('style');
                        $('.pfp_3_3_a:first-child').focus();
                    }
                }
                if ($('#pfp_3_2_f_value').val() != "") {
                    $('.pfp_3_3_a').removeAttr("disabled");
                    $('.pfp_3_3_a').parent().parent().removeAttr('style');
                    $('.pfp_3_3_a:first-child').focus();
                }
                if ($('.pfp_3_3_a:checked').val() != "" && $('.pfp_3_3_a:checked').val() !== undefined) {
                    if ($('.pfp_3_3_a:checked').val() == 1) {
                        $('.pfp_3_3_b').removeAttr("disabled");
                        $('.pfp_3_3_b').parent().parent().removeAttr('style');
                        $('.pfp_3_3_b:first-child').focus();
                    } else {
                        if ($('#pp_2_14_a_flag').val() == 1) {
                            $('.pfp_3_3_d').removeAttr("disabled");
                            $('.pfp_3_3_d').parent().parent().removeAttr('style');
                            $('.pfp_3_3_d:first-child').focus();
                        } else {
                            $('.pfp_3_4_a').removeAttr("disabled");
                            $('.pfp_3_4_a').parent().parent().removeAttr('style');
                            $('.pfp_3_4_a:first-child').focus();
                        }
                    }
                }
                if ($('.pfp_3_3_b:checked').val() != "" && $('.pfp_3_3_b:checked').val() !== undefined) {
                    if ($('.pfp_3_3_b:checked').val() == 1) {
                        $('#pfp_3_3_c').removeAttr("disabled");
                        $('#pfp_3_3_c').parent().parent().removeAttr('style');
                        $('#pfp_3_3_c').focus();
                    } else {
                        $('.pfp_3_4_a').removeAttr("disabled");
                        $('.pfp_3_4_a').parent().parent().removeAttr('style');
                        $('.pfp_3_4_a:first-child').focus();
                    }
                }
                if ($('.pfp_3_3_c:first-child').val() != "") {
                    $('.pfp_3_3_c').next().removeAttr("disabled");
                    if ($('#pp_2_14_a_flag').val() == 1) {
                        $('.pfp_3_3_d').removeAttr("disabled");
                        $('.pfp_3_3_d').parent().parent().removeAttr('style');
                        $('.pfp_3_3_d:first-child').focus();
                    } else {
                        $('.pfp_3_4_a').removeAttr("disabled");
                        $('.pfp_3_4_a').parent().parent().removeAttr('style');
                        $('.pfp_3_4_a:first-child').focus();
                    }
                }
                if ($('.pfp_3_3_d:checked').val() != "" && $('.pfp_3_3_d:checked').val() !== undefined) {
                    $('.pfp_3_4_a').removeAttr("disabled");
                    $('.pfp_3_4_a').parent().parent().removeAttr('style');
                    $('.pfp_3_4_a:first-child').focus();
                }

                if ($('.pfp_3_4_a:checked').val() != "" && $('.pfp_3_4_a:checked').val() !== undefined) {
                    if ($('.pfp_3_4_a:checked').val() == 1) {
                        $('.pfp_3_4_b').removeAttr("disabled");
                        $('.pfp_3_4_b').parent().parent().removeAttr('style');
                        $('.pfp_3_4_b:first-child').focus();
                    } else {
                        if ($('.pp_2_1_a:checked').val() == 1) {
                            $('.pm_4_1_a').removeAttr("disabled");
                            $('.pm_4_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        } else if ($('.pfp_3_1_a:checked').val() == 1) {
                            $('.pm_4_4_a').removeAttr("disabled");
                            $('.pm_4_4_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_4_a:first-child').focus();
                        } else if ($('.pfp_3_2_a:checked').val() == 1) {
                            $('.pm_4_5_a').removeAttr("disabled");
                            $('.pm_4_5_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_5_a:first-child').focus();
                        } else if ($('.pfp_3_3_a:checked').val() == 1) {
                            $('.pm_4_6_a').removeAttr("disabled");
                            $('.pm_4_6_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_6_a:first-child').focus();
                        } else if ($('.pfp_3_4_a:checked').val() == 1) {
                            $('.pm_4_7_a').removeAttr("disabled");
                            $('.pm_4_7_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_7_a:first-child').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            setTimeout(function () {
                                $('.wizard-next').trigger('click');
                            }, 1000);
                        }
                    }
                }
                if ($('.pfp_3_4_b:checked').val() != "" && $('.pfp_3_4_b:checked').val() !== undefined) {
                    if ($('.pfp_3_4_b:checked').val() == 1) {
                        $('#pfp_3_4_c').removeAttr("disabled");
                        $('#pfp_3_4_c').parent().parent().removeAttr('style');
                        $('#pfp_3_4_c').focus();
                    } else {
                        if ($('.pp_2_1_a:checked').val() == 1) {
                            $('.pm_4_1_a').removeAttr("disabled");
                            $('.pm_4_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        } else if ($('.pfp_3_1_a:checked').val() == 1) {
                            $('.pm_4_4_a').removeAttr("disabled");
                            $('.pm_4_4_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_4_a:first-child').focus();
                        } else if ($('.pfp_3_2_a:checked').val() == 1) {
                            $('.pm_4_5_a').removeAttr("disabled");
                            $('.pm_4_5_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_5_a:first-child').focus();
                        } else if ($('.pfp_3_3_a:checked').val() == 1) {
                            $('.pm_4_6_a').removeAttr("disabled");
                            $('.pm_4_6_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_6_a:first-child').focus();
                        } else if ($('.pfp_3_4_a:checked').val() == 1) {
                            $('.pm_4_7_a').removeAttr("disabled");
                            $('.pm_4_7_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            $('.pm_4_7_a:first-child').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                            setTimeout(function () {
                                $('.wizard-next').trigger('click');
                            }, 1000);
                        }
                    }
                }
                if ($('.pfp_3_4_c:first-child').val() != "") {
                    $('.pfp_3_4_c').next().removeAttr("disabled");
                    if ($('.pp_2_1_a:checked').val() == 1) {
                        $('.pm_4_1_a').removeAttr("disabled");
                        $('.pm_4_1_a').parent().parent().removeAttr('style');
                        //  $('.wizard-next').trigger('click');
                    } else if ($('.pfp_3_1_a:checked').val() == 1) {
                        $('.pm_4_4_a').removeAttr("disabled");
                        $('.pm_4_4_a').parent().parent().removeAttr('style');
                        //$('.wizard-next').trigger('click');
                        $('.pm_4_4_a:first-child').focus();
                    } else if ($('.pfp_3_2_a:checked').val() == 1) {
                        $('.pm_4_5_a').removeAttr("disabled");
                        $('.pm_4_5_a').parent().parent().removeAttr('style');
                        //$('.wizard-next').trigger('click');
                        $('.pm_4_5_a:first-child').focus();
                    } else if ($('.pfp_3_3_a:checked').val() == 1) {
                        $('.pm_4_6_a').removeAttr("disabled");
                        $('.pm_4_6_a').parent().parent().removeAttr('style');
                        // $('.wizard-next').trigger('click');
                        $('.pm_4_6_a:first-child').focus();
                    } else if ($('.pfp_3_4_a:checked').val() == 1) {
                        $('.pm_4_7_a').removeAttr("disabled");
                        $('.pm_4_7_a').parent().parent().removeAttr('style');
                        // $('.wizard-next').trigger('click');
                        $('.pm_4_7_a:first-child').focus();
                    } else {
                        $('.i_5_1_a').removeAttr("disabled");
                        $('.i_5_1_a').parent().parent().removeAttr('style');
                        // $('.wizard-next').trigger('click');
                        // setTimeout(function () {
                        //     $('.wizard-next').trigger('click');
                        // }, 1000);
                    }
                }

                setTimeout(function () {

                    if ($('.pm_4_1_a:checked').val() != "" && $('.pm_4_1_a:checked').val() !== undefined) {
                        if ($('.pm_4_1_a:checked').val() == 1) {
                            $('#pm_4_1_b').removeAttr("disabled");
                            $('#pm_4_1_b').parent().parent().removeAttr('style');
                            $('#pm_4_1_b').focus();
                        } else {
                            $('.pm_4_2_a').removeAttr("disabled");
                            $('.pm_4_2_a').parent().parent().removeAttr('style');
                            $('.pm_4_2_a:first-child').focus();
                        }
                    }
                    if ($('#pm_4_1_b').val() != "") {
                        $('.pm_4_2_a').removeAttr("disabled");
                        $('.pm_4_2_a').parent().parent().removeAttr('style');
                        $('.pm_4_2_a:first-child').focus();
                    }
                    if ($('.pm_4_2_a:checked').val() != "" && $('.pm_4_2_a:checked').val() !== undefined) {
                        if ($('.pm_4_2_a:checked').val() == 1) {
                            $('#pm_4_2_b').removeAttr("disabled");
                            $('#pm_4_2_b').parent().parent().removeAttr('style');
                            $('#pm_4_2_b').focus();
                        } else {
                            if ($('.pp_2_1_a:checked').val() == 1) {
                                $('.pm_4_3_a').removeAttr("disabled");
                                $('.pm_4_3_a').parent().parent().removeAttr('style');
                                $('.pm_4_3_a').focus();
                            } else {
                                $('#pm_4_3_b').removeAttr("disabled");
                                $('#pm_4_3_b').parent().parent().removeAttr('style');
                                $('#pm_4_3_b').focus();
                            }
                        }
                    }
                    if ($('#pm_4_2_b').val() != "") {
                        $('.pm_4_2_c').removeAttr("disabled");
                        $('.pm_4_2_c').parent().parent().removeAttr('style');
                        $('.pm_4_2_c:first-child').focus();
                    }
                    if ($('.pm_4_2_c:checked').val() != "" && $('.pm_4_2_c:checked').val() !== undefined) {
                        if ($('.pm_4_2_c:checked').val() == 1) {
                            $('#pm_4_2_d').removeAttr("disabled");
                            $('#pm_4_2_d').parent().parent().removeAttr('style');
                            $('#pm_4_2_d').focus();
                        } else {
                            if ($('.pp_2_1_a:checked').val() == 1) {
                                $('.pm_4_3_a').removeAttr("disabled");
                                $('.pm_4_3_a').parent().parent().removeAttr('style');
                                $('.pm_4_3_a:first-child').focus();
                            } else {
                                $('#pm_4_3_b').removeAttr("disabled");
                                $('#pm_4_3_b').parent().parent().removeAttr('style');
                                $('#pm_4_3_b').focus();
                            }
                        }
                    }
                    if ($('#pm_4_2_d').val() != "") {
                        if ($('.pp_2_1_a:checked').val() == 1) {
                            $('.pm_4_3_a').removeAttr("disabled");
                            $('.pm_4_3_a').parent().parent().removeAttr('style');
                            $('.pm_4_3_a:first-child').focus();
                        } else {
                            $('#pm_4_3_b').removeAttr("disabled");
                            $('#pm_4_3_b').parent().parent().removeAttr('style');
                            $('#pm_4_3_b').focus();
                        }
                    }
                    if ($('.pm_4_3_a:checked').val() != "" && $('.pm_4_3_a:checked').val() !== undefined) {
                        if ($('.pm_4_3_a:checked').val() == 1) {
                            $('#pm_4_3_b').removeAttr("disabled");
                            $('#pm_4_3_b').parent().parent().removeAttr('style');
                            $('#pm_4_3_b').focus();
                        } else {
                            if ($('.pfp_3_1_a:checked').val() == 1) {
                                $('.pm_4_4_a').removeAttr("disabled");
                                $('.pm_4_4_a').parent().parent().removeAttr('style');
                                $('.pm_4_4_a:first-child').focus();
                            } else if ($('.pfp_3_2_a:checked').val() == 1) {
                                $('.pm_4_5_a').removeAttr("disabled");
                                $('.pm_4_5_a').parent().parent().removeAttr('style');
                                $('.pm_4_5_a:first-child').focus();
                            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                                $('.pm_4_6_a').removeAttr("disabled");
                                $('.pm_4_6_a').parent().parent().removeAttr('style');
                                $('.pm_4_6_a:first-child').focus();
                            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                                $('.pm_4_7_a').removeAttr("disabled");
                                $('.pm_4_7_a').parent().parent().removeAttr('style');
                                $('.pm_4_7_a:first-child').focus();
                            } else {
                                $('.i_5_1_a').removeAttr("disabled");
                                $('.i_5_1_a').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                    }
                    if ($('#pm_4_3_b').val() != "") {
                        if ($('.pfp_3_1_a:checked').val() == 1) {
                            $('.pm_4_4_a').removeAttr("disabled");
                            $('.pm_4_4_a').parent().parent().removeAttr('style');
                            $('.pm_4_4_a:first-child').focus();
                        } else if ($('.pfp_3_2_a:checked').val() == 1) {
                            $('.pm_4_5_a').removeAttr("disabled");
                            $('.pm_4_5_a').parent().parent().removeAttr('style');
                            $('.pm_4_5_a:first-child').focus();
                        } else if ($('.pfp_3_3_a:checked').val() == 1) {
                            $('.pm_4_6_a').removeAttr("disabled");
                            $('.pm_4_6_a').parent().parent().removeAttr('style');
                            $('.pm_4_6_a:first-child').focus();
                        } else if ($('.pfp_3_4_a:checked').val() == 1) {
                            $('.pm_4_7_a').removeAttr("disabled");
                            $('.pm_4_7_a').parent().parent().removeAttr('style');
                            $('.pm_4_7_a:first-child').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        }
                    }
                    if ($('.pm_4_4_a:checked').val() != "" && $('.pm_4_4_a:checked').val() !== undefined) {
                        if ($('.pm_4_4_a:checked').val() == 1) {
                            $('#pm_4_4_b').removeAttr("disabled");
                            $('#pm_4_4_b').parent().parent().removeAttr('style');
                            $('#pm_4_4_b').focus();
                        } else {
                            $('.pm_4_4_c').removeAttr("disabled");
                            $('.pm_4_4_c').parent().parent().removeAttr('style');
                            $('.pm_4_4_c:first-child').focus();
                        }
                    }

                    if ($('#pm_4_4_b').val() != "") {
                        $('.pm_4_4_c').removeAttr("disabled");
                        $('.pm_4_4_c').parent().parent().removeAttr('style');
                        $('.pm_4_4_c:first-child').focus();
                    }
                    if ($('.pm_4_4_c:checked').val() != "" && $('.pm_4_4_c:checked').val() !== undefined) {
                        if ($('.pm_4_4_c:checked').val() == 1) {
                            $('#pm_4_4_d').removeAttr("disabled");
                            $('#pm_4_4_d').parent().parent().removeAttr('style');
                            $('#pm_4_4_d').focus();
                        } else {
                            $('.pm_4_4_e').removeAttr("disabled");
                            $('.pm_4_4_e').parent().parent().removeAttr('style');
                            $('.pm_4_4_e:first-child').focus();
                        }
                    }

                    if ($('#pm_4_4_d').val() != "") {
                        $('.pm_4_4_e').removeAttr("disabled");
                        $('.pm_4_4_e').parent().parent().removeAttr('style');
                        $('.pm_4_4_e:first-child').focus();
                    }
                    if ($('.pm_4_4_e:checked').val() != "" && $('.pm_4_4_e:checked').val() !== undefined) {
                        if ($('.pm_4_4_e:checked').val() == 1) {
                            $('#pm_4_4_f').removeAttr("disabled");
                            $('#pm_4_4_f').parent().parent().removeAttr('style');
                            $('#pm_4_4_f').focus();
                        } else {
                            $('.pm_4_4_g').removeAttr("disabled");
                            $('.pm_4_4_g').parent().parent().removeAttr('style');
                            $('.pm_4_4_g:first-child').focus();
                        }
                    }

                    if ($('#pm_4_4_f').val() != "") {
                        $('.pm_4_4_g').removeAttr("disabled");
                        $('.pm_4_4_g').parent().parent().removeAttr('style');
                        $('.pm_4_4_g:first-child').focus();
                    }
                    if ($('.pm_4_4_g:checked').val() != "" && $('.pm_4_4_g:checked').val() !== undefined) {
                        if ($('.pm_4_4_g:checked').val() == 1) {
                            $('#pm_4_4_h').removeAttr("disabled");
                            $('#pm_4_4_h').parent().parent().removeAttr('style');
                            $('#pm_4_4_h').focus();
                        } else {
                            if ($('.pfp_3_2_a:checked').val() == 1) {
                                $('.pm_4_5_a').removeAttr("disabled");
                                $('.pm_4_5_a').parent().parent().removeAttr('style');
                                $('.pm_4_5_a:first-child').focus();
                            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                                $('.pm_4_6_a').removeAttr("disabled");
                                $('.pm_4_6_a').parent().parent().removeAttr('style');
                                $('.pm_4_6_a:first-child').focus();
                            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                                $('.pm_4_7_a').removeAttr("disabled");
                                $('.pm_4_7_a').parent().parent().removeAttr('style');
                                $('.pm_4_7_a:first-child').focus();
                            } else {
                                $('.i_5_1_a').removeAttr("disabled");
                                $('.i_5_1_a').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                    }

                    if ($('#pm_4_4_h').val() != "") {
                        $('.pm_4_4_i').removeAttr("disabled");
                        $('.pm_4_4_i').parent().parent().removeAttr('style');
                        $('.pm_4_4_i:first-child').focus();
                    }
                    if ($('.pm_4_4_i:checked').val() != "" && $('.pm_4_4_i:checked').val() !== undefined) {
                        if ($('.pm_4_4_i:checked').val() == 1) {
                            $('#pm_4_4_j').removeAttr("disabled");
                            $('#pm_4_4_j').parent().parent().removeAttr('style');
                            $('#pm_4_4_j').focus();
                        } else {
                            if ($('.pfp_3_2_a:checked').val() == 1) {
                                $('.pm_4_5_a').removeAttr("disabled");
                                $('.pm_4_5_a').parent().parent().removeAttr('style');
                                $('.pm_4_5_a:first-child').focus();
                            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                                $('.pm_4_6_a').removeAttr("disabled");
                                $('.pm_4_6_a').parent().parent().removeAttr('style');
                                $('.pm_4_6_a:first-child').focus();
                            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                                $('.pm_4_7_a').removeAttr("disabled");
                                $('.pm_4_7_a').parent().parent().removeAttr('style');
                                $('.pm_4_7_a:first-child').focus();
                            } else {
                                $('.i_5_1_a').removeAttr("disabled");
                                $('.i_5_1_a').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                    }

                    if ($('#pm_4_4_j').val() != "") {
                        if ($('.pfp_3_2_a:checked').val() == 1) {
                            $('.pm_4_5_a').removeAttr("disabled");
                            $('.pm_4_5_a').parent().parent().removeAttr('style');
                            $('.pm_4_5_a:first-child').focus();
                        } else if ($('.pfp_3_3_a:checked').val() == 1) {
                            $('.pm_4_6_a').removeAttr("disabled");
                            $('.pm_4_6_a').parent().parent().removeAttr('style');
                            $('.pm_4_6_a:first-child').focus();
                        } else if ($('.pfp_3_4_a:checked').val() == 1) {
                            $('.pm_4_7_a').removeAttr("disabled");
                            $('.pm_4_7_a').parent().parent().removeAttr('style');
                            $('.pm_4_7_a:first-child').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        }
                    }

                    if ($('.pm_4_5_a:checked').val() != "" && $('.pm_4_5_a:checked').val() !== undefined) {
                        if ($('.pm_4_5_a:checked').val() == 1) {
                            $('#pm_4_5_b').removeAttr("disabled");
                            $('#pm_4_5_b').parent().parent().removeAttr('style');
                            $('#pm_4_5_b').focus();
                        } else {
                            $('.pm_4_5_c').removeAttr("disabled");
                            $('.pm_4_5_c').parent().parent().removeAttr('style');
                            $('.pm_4_5_c:first-child').focus();
                        }
                    }

                    if ($('#pm_4_5_b').val() != "") {
                        $('.pm_4_5_c').removeAttr("disabled");
                        $('.pm_4_5_c').parent().parent().removeAttr('style');
                        $('.pm_4_5_c:first-child').focus();
                    }
                    if ($('.pm_4_5_c:checked').val() != "" && $('.pm_4_5_c:checked').val() !== undefined) {
                        if ($('.pm_4_5_c:checked').val() == 1) {
                            $('#pm_4_5_d').removeAttr("disabled");
                            $('#pm_4_5_d').parent().parent().removeAttr('style');
                            $('#pm_4_5_d').focus();
                        } else {
                            $('.pm_4_5_e').removeAttr("disabled");
                            $('.pm_4_5_e').parent().parent().removeAttr('style');
                            $('.pm_4_5_e:first-child').focus();
                        }
                    }

                    if ($('#pm_4_5_d').val() != "") {
                        $('.pm_4_5_e').removeAttr("disabled");
                        $('.pm_4_5_e').parent().parent().removeAttr('style');
                        $('.pm_4_5_e:first-child').focus();
                    }
                    if ($('.pm_4_5_e:checked').val() != "" && $('.pm_4_5_e:checked').val() !== undefined) {
                        if ($('.pm_4_5_e:checked').val() == 1) {
                            $('#pm_4_5_f').removeAttr("disabled");
                            $('#pm_4_5_f').parent().parent().removeAttr('style');
                            $('#pm_4_5_f').focus();
                        } else {
                            $('.pm_4_5_g').removeAttr("disabled");
                            $('.pm_4_5_g').parent().parent().removeAttr('style');
                            $('.pm_4_5_g:first-child').focus();
                        }
                    }

                    if ($('#pm_4_5_f').val() != "") {
                        $('.pm_4_5_g').removeAttr("disabled");
                        $('.pm_4_5_g').parent().parent().removeAttr('style');
                        $('.pm_4_5_g:first-child').focus();
                    }
                    if ($('.pm_4_5_g:checked').val() != "" && $('.pm_4_5_g:checked').val() !== undefined) {
                        if ($('.pm_4_5_g:checked').val() == 1) {
                            $('#pm_4_5_h').removeAttr("disabled");
                            $('#pm_4_5_h').parent().parent().removeAttr('style');
                            $('#pm_4_5_h').focus();
                        } else {
                            if ($('.pfp_3_3_a:checked').val() == 1) {
                                $('.pm_4_6_a').removeAttr("disabled");
                                $('.pm_4_6_a').parent().parent().removeAttr('style');
                                $('.pm_4_6_a:first-child').focus();
                            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                                $('.pm_4_7_a').removeAttr("disabled");
                                $('.pm_4_7_a').parent().parent().removeAttr('style');
                                $('.pm_4_7_a:first-child').focus();
                            } else {
                                $('.i_5_1_a').removeAttr("disabled");
                                $('.i_5_1_a').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                    }

                    if ($('#pm_4_5_h').val() != "") {
                        $('.pm_4_5_i').removeAttr("disabled");
                        $('.pm_4_5_i').parent().parent().removeAttr('style');
                        $('.pm_4_5_i:first-child').focus();
                    }
                    if ($('.pm_4_5_i:checked').val() != "" && $('.pm_4_5_i:checked').val() !== undefined) {
                        if ($('.pm_4_5_i:checked').val() == 1) {
                            $('#pm_4_5_j').removeAttr("disabled");
                            $('#pm_4_5_j').parent().parent().removeAttr('style');
                            $('#pm_4_5_j').focus();
                        } else {
                            if ($('.pfp_3_3_a:checked').val() == 1) {
                                $('.pm_4_6_a').removeAttr("disabled");
                                $('.pm_4_6_a').parent().parent().removeAttr('style');
                                $('.pm_4_6_a:first-child').focus();
                            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                                $('.pm_4_7_a').removeAttr("disabled");
                                $('.pm_4_7_a').parent().parent().removeAttr('style');
                                $('.pm_4_7_a:first-child').focus();
                            } else {
                                $('.i_5_1_a').removeAttr("disabled");
                                $('.i_5_1_a').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                    }

                    if ($('#pm_4_5_j').val() != "") {
                        if ($('.pfp_3_3_a:checked').val() == 1) {
                            $('.pm_4_6_a').removeAttr("disabled");
                            $('.pm_4_6_a').parent().parent().removeAttr('style');
                            $('.pm_4_6_a:first-child').focus();
                        } else if ($('.pfp_3_4_a:checked').val() == 1) {
                            $('.pm_4_7_a').removeAttr("disabled");
                            $('.pm_4_7_a').parent().parent().removeAttr('style');
                            $('.pm_4_7_a').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        }
                    }

                    if ($('.pm_4_6_a:checked').val() != "" && $('.pm_4_6_a:checked').val() !== undefined) {
                        if ($('.pm_4_6_a:checked').val() == 1) {
                            $('#pm_4_6_b').removeAttr("disabled");
                            $('#pm_4_6_b').parent().parent().removeAttr('style');
                            $('#pm_4_6_b').focus();
                        } else {
                            $('.pm_4_6_c').removeAttr("disabled");
                            $('.pm_4_6_c').parent().parent().removeAttr('style');
                            $('.pm_4_6_c:first-child').focus();
                        }
                    }

                    if ($('#pm_4_6_b').val() != "") {
                        $('.pm_4_6_c').removeAttr("disabled");
                        $('.pm_4_6_c').parent().parent().removeAttr('style');
                        $('.pm_4_6_c:first-child').focus();
                    }

                    if ($('.pm_4_6_c:checked').val() != "" && $('.pm_4_6_c:checked').val() !== undefined) {
                        if ($('.pm_4_6_c:checked').val() == 1) {
                            $('#pm_4_6_d').removeAttr("disabled");
                            $('#pm_4_6_d').parent().parent().removeAttr('style');
                            $('#pm_4_6_d').focus();
                        } else {
                            $('.pm_4_6_e').removeAttr("disabled");
                            $('.pm_4_6_e').parent().parent().removeAttr('style');
                            $('.pm_4_6_e:first-child').focus();
                        }
                    }

                    if ($('#pm_4_6_d').val() != "") {
                        $('.pm_4_6_e').removeAttr("disabled");
                        $('.pm_4_6_e').parent().parent().removeAttr('style');
                        $('.pm_4_6_e:first-child').focus();
                    }
                    if ($('.pm_4_6_e:checked').val() != "" && $('.pm_4_6_e:checked').val() !== undefined) {
                        if ($('.pm_4_6_e:checked').val() == 1) {
                            $('#pm_4_6_f').removeAttr("disabled");
                            $('#pm_4_6_f').parent().parent().removeAttr('style');
                            $('#pm_4_6_f').focus();
                        } else {
                            $('.pm_4_6_g').removeAttr("disabled");
                            $('.pm_4_6_g').parent().parent().removeAttr('style');
                            $('.pm_4_6_g:first-child').focus();
                        }
                    }
                    if ($('#pm_4_6_f').val() != "") {
                        $('.pm_4_6_g').removeAttr("disabled");
                        $('.pm_4_6_g').parent().parent().removeAttr('style');
                        $('.pm_4_6_g:first-child').focus();
                    }

                    if ($('.pm_4_6_g:checked').val() != "" && $('.pm_4_6_g:checked').val() !== undefined) {
                        if ($('.pm_4_6_g:checked').val() == 1) {
                            $('#pm_4_6_h').removeAttr("disabled");
                            $('#pm_4_6_h').parent().parent().removeAttr('style');
                            $('#pm_4_6_h').focus();
                        } else {
                            if ($('.pfp_3_4_a:checked').val() == 1) {
                                $('.pm_4_7_a').removeAttr("disabled");
                                $('.pm_4_7_a').parent().parent().removeAttr('style');
                                $('.pm_4_7_a:first-child').focus();
                            } else {
                                $('.i_5_1_a').removeAttr("disabled");
                                $('.i_5_1_a').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                    }

                    if ($('#pm_4_6_h').val() != "") {
                        $('.pm_4_6_i').removeAttr("disabled");
                        $('.pm_4_6_i').parent().parent().removeAttr('style');
                        $('.pm_4_6_i:first-child').focus();
                    }

                    if ($('.pm_4_6_i:checked').val() != "" && $('.pm_4_6_i:checked').val() !== undefined) {
                        if ($('.pm_4_6_i:checked').val() == 1) {
                            $('#pm_4_6_j').removeAttr("disabled");
                            $('#pm_4_6_j').parent().parent().removeAttr('style');
                            $('#pm_4_6_j').focus();
                        } else {
                            if ($('.pfp_3_4_a:checked').val() == 1) {
                                $('.pm_4_7_a').removeAttr("disabled");
                                $('.pm_4_7_a').parent().parent().removeAttr('style');
                                $('.pm_4_7_a:first-child').focus();
                            } else {
                                $('.i_5_1_a').removeAttr("disabled");
                                $('.i_5_1_a').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                    }

                    if ($('#pm_4_6_j').val() != "") {
                        if ($('.pfp_3_4_a:checked').val() == 1) {
                            $('.pm_4_7_a').removeAttr("disabled");
                            $('.pm_4_7_a').parent().parent().removeAttr('style');
                            $('.pm_4_7_a:first-child').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        }
                    }
                    if ($('.pm_4_7_a:checked').val() != "" && $('.pm_4_7_a:checked').val() !== undefined) {
                        if ($('.pm_4_7_a:checked').val() == 1) {
                            $('#pm_4_7_b').removeAttr("disabled");
                            $('#pm_4_7_b').parent().parent().removeAttr('style');
                            $('#pm_4_7_b').focus();
                        } else {
                            $('.pm_4_7_c').removeAttr("disabled");
                            $('.pm_4_7_c').parent().parent().removeAttr('style');
                            $('.pm_4_7_c:first-child').focus();
                        }
                    }
                    if ($('#pm_4_7_b').val() != "") {
                        $('.pm_4_7_c').removeAttr("disabled");
                        $('.pm_4_7_c').parent().parent().removeAttr('style');
                        $('.pm_4_7_c:first-child').focus();
                    }
                    if ($('.pm_4_7_c:checked').val() != "" && $('.pm_4_7_c:checked').val() !== undefined) {
                        if ($('.pm_4_7_c:checked').val() == 1) {
                            $('#pm_4_7_d').removeAttr("disabled");
                            $('#pm_4_7_d').parent().parent().removeAttr('style');
                            $('#pm_4_7_d').focus();
                        } else {
                            $('.pm_4_7_e').removeAttr("disabled");
                            $('.pm_4_7_e').parent().parent().removeAttr('style');
                            $('.pm_4_7_e:first-child').focus();
                        }
                    }
                    if ($('#pm_4_7_d').val() != "") {
                        $('.pm_4_7_e').removeAttr("disabled");
                        $('.pm_4_7_e').parent().parent().removeAttr('style');
                        $('.pm_4_7_e:first-child').focus();
                    }
                    if ($('.pm_4_7_e:checked').val() != "" && $('.pm_4_7_e:checked').val() !== undefined) {
                        if ($('.pm_4_7_e:checked').val() == 1) {
                            $('#pm_4_7_f').removeAttr("disabled");
                            $('#pm_4_7_f').parent().parent().removeAttr('style');
                            $('#pm_4_7_f').focus();
                        } else {
                            $('.pm_4_7_g').removeAttr("disabled");
                            $('.pm_4_7_g').parent().parent().removeAttr('style');
                            $('.pm_4_7_g:first-child').focus();
                        }
                    }

                    if ($('#pm_4_7_f').val() != "") {
                        $('.pm_4_7_g').removeAttr("disabled");
                        $('.pm_4_7_g').parent().parent().removeAttr('style');
                        $('.pm_4_7_g:first-child').focus();
                    }
                    if ($('.pm_4_7_g:checked').val() != "" && $('.pm_4_7_g:checked').val() !== undefined) {
                        if ($('.pm_4_7_g:checked').val() == 1) {
                            $('#pm_4_7_h').removeAttr("disabled");
                            $('#pm_4_7_h').parent().parent().removeAttr('style');
                            $('#pm_4_7_h').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        }
                    }

                    if ($('#pm_4_7_h').val() != "") {
                        $('.pm_4_7_i').removeAttr("disabled");
                        $('.pm_4_7_i').parent().parent().removeAttr('style');
                        $('.pm_4_7_i:first-child').focus();
                    }
                    if ($('.pm_4_7_i:checked').val() != "" && $('.pm_4_7_i:checked').val() !== undefined) {
                        if ($('.pm_4_7_i:checked').val() == 1) {
                            $('#pm_4_7_j').removeAttr("disabled");
                            $('#pm_4_7_j').parent().parent().removeAttr('style');
                            $('#pm_4_7_j').focus();
                        } else {
                            $('.i_5_1_a').removeAttr("disabled");
                            $('.i_5_1_a').parent().parent().removeAttr('style');
                            $('.wizard-next').trigger('click');
                        }
                    }

                    if ($('#pm_4_7_j').val() != "") {
                        $('.i_5_1_a').removeAttr("disabled");
                        $('.i_5_1_a').parent().parent().removeAttr('style');
                        $('.wizard-next').trigger('click');
                    }

                    setTimeout(function () {
                        if ($('.i_5_1_a:checked').val() != "" && $('.i_5_1_a:checked').val() !== undefined) {
                            if ($('.i_5_1_a:checked').val() == 1) {
                                $('.i_5_1_b').removeAttr("disabled");
                                $('.i_5_1_b').parent().parent().removeAttr('style');
                                $('.i_5_1_b:first-child').focus();
                            } else {
                                $('.i_5_4_a_flag').removeAttr("disabled");
                                $('.i_5_4_a_flag').parent().parent().removeAttr('style');
                                $('.i_5_4_a_flag:first-child').focus();
                            }
                        }
                        if ($('.i_5_1_b:checked').val() != "" && $('.i_5_1_b:checked').val() !== undefined) {
                            $('.i_5_1_c').removeAttr("disabled");
                            $('.i_5_1_c').parent().parent().removeAttr('style');
                            $('.i_5_1_c:first-child').focus();
                        }
                        if ($('.i_5_1_c:checked').val() != "" && $('.i_5_1_c:checked').val() !== undefined) {
                            $('.i_5_1_d').removeAttr("disabled");
                            $('.i_5_1_d').parent().parent().removeAttr('style');
                            $('.i_5_1_d:first-child').focus();
                        }

                        if ($('.i_5_1_d:checked').val() != "" && $('.i_5_1_d:checked').val() !== undefined) {
                            $('.i_5_2_a_flag').removeAttr("disabled");
                            $('#i_5_2_a_value').removeAttr("disabled");
                            $('#i_5_2_a_value').parent().parent().removeAttr('style');
                            $('#i_5_2_a_value').focus();
                        }

                        if ($('#i_5_2_a_value').val() != "") {
                            $('.i_5_3_a').removeAttr("disabled");
                            $('.i_5_3_a').parent().parent().removeAttr('style');
                            $('.i_5_3_a:first-child').focus();
                        }
                        if ($('.i_5_2_a_flag:checked').val() != "" && $('.i_5_2_a_flag:checked').val() !== undefined) {
                            $('.i_5_3_a').removeAttr("disabled");
                            $('.i_5_3_a').parent().parent().removeAttr('style');
                            $('.i_5_3_a:first-child').focus();
                        }
                        if ($('.i_5_3_a:checked').val() != "" && $('.i_5_3_a:checked').val() !== undefined) {
                            $('.i_5_3_b').removeAttr("disabled");
                            $('.i_5_3_b').parent().parent().removeAttr('style');
                            $('.i_5_3_b:first-child').focus();
                        }
                        if ($('.i_5_3_b:checked').val() != "" && $('.i_5_3_b:checked').val() !== undefined) {
                            if ($('.i_5_3_b:checked').val() == 1) {
                                $('#i_5_3_c_flag').removeAttr("disabled");
                                $('#i_5_3_c_flag').parent().parent().removeAttr('style');
                                $('#i_5_3_c_flag').focus();
                            } else {
                                $('.i_5_4_a_flag').removeAttr("disabled");
                                $('.i_5_4_a_flag').parent().parent().removeAttr('style');
                                $('.i_5_4_a_flag:first-child').focus();
                            }
                        }
                        //
                        if ($('#i_5_3_c_flag').val() != "") {
                            if ($('#i_5_3_c_flag').val() == 77) {
                                $('#i_5_3_c_value').removeAttr("disabled");
                                $('#i_5_3_c_value').focus();
                            } else {
                                $('.i_5_4_a_flag').removeAttr("disabled");
                                $('.i_5_4_a_flag').parent().parent().removeAttr('style');
                                $('.i_5_4_a_flag:first-child').focus();
                            }
                        }
                        if ($('#i_5_3_c_value').val() != "") {
                            $('.i_5_4_a_flag').removeAttr("disabled");
                            $('.i_5_4_a_flag').parent().parent().removeAttr('style');
                            $('.i_5_4_a_flag:first-child').focus();
                        }
                        if ($('.i_5_4_a_flag:checked').val() != "" && $('.i_5_4_a_flag:checked').val() !== undefined) {
                            if ($('.i_5_4_a_flag:checked').val() == 1) {

                                $('#i_5_4_a_value').removeAttr("disabled");
                                $('#i_5_4_a_value').parent().parent().removeAttr('style');
                                $('#i_5_4_a_value').focus();

                                //  $('.i_5_4_b').removeAttr("disabled");
                                // $('.i_5_4_b').parent().parent().removeAttr('style');
                                // $('.i_5_4_b:first-child').focus();
                            } else {
                                $('#i_5_4_a_value').val('');
                                $('#i_5_4_a_value').attr("disabled", "disabled");
                                $('#d_6_1').removeAttr("disabled");
                                $('#d_6_1').parent().parent().removeAttr('style');
                                $('.wizard-next').trigger('click');
                            }
                        }
                        if ($('#i_5_4_a_value').val() != "") {
                            $('.i_5_4_b').parent().parent().removeAttr('style');
                            $('.i_5_4_c').parent().parent().removeAttr('style');
                            $('.i_5_4_d').parent().parent().removeAttr('style');
                            $('.i_5_5_a_value').parent().parent().removeAttr('style');
                            $('.i_5_5_a_flag').parent().parent().removeAttr('style');
                            $('.i_5_5_b').parent().parent().removeAttr('style');
                            $('.i_5_6_a').parent().parent().removeAttr('style');
                            $('.i_5_6_b').parent().parent().removeAttr('style');
                            $('.i_5_6_c_value').parent().parent().removeAttr('style');
                            $('.i_5_6_c_flag').parent().parent().removeAttr('style');

                            if ($('#i_5_4_a_value').val() == 1) {
                                $('.i_5_4_b:first-child').removeAttr("disabled");
                                $('.i_5_4_c:first-child').removeAttr("disabled");
                                $('.i_5_4_d:first-child').removeAttr("disabled");
                                $('.i_5_5_a_value:first-child').removeAttr("disabled");
                                $('.i_5_5_a_flag_0').removeAttr("disabled");
                                $('.i_5_5_b:first-child').removeAttr("disabled");
                                $('.i_5_6_a:first-child').removeAttr("disabled");
                                $('.i_5_6_b:first-child').removeAttr("disabled");
                                // $('.i_5_6_c_value:nth-child(2)').removeAttr("disabled");
                                $('.i_5_6_c_flag:first-child').removeAttr("disabled");
                            } else if ($('#i_5_4_a_value').val() == 2) {
                                $('.i_5_4_b:first-child').removeAttr("disabled");
                                $('.i_5_4_c:first-child').removeAttr("disabled");
                                $('.i_5_4_d:first-child').removeAttr("disabled");
                                $('.i_5_5_a_value:first-child').removeAttr("disabled");
                                $('.i_5_5_a_flag_0').removeAttr("disabled");
                                $('.i_5_5_b:first-child').removeAttr("disabled");
                                $('.i_5_6_a:first-child').removeAttr("disabled");
                                $('.i_5_6_b:first-child').removeAttr("disabled");
                                //$('.i_5_6_c_value:nth-child(2)').removeAttr("disabled");
                                $('.i_5_6_c_flag:first-child').removeAttr("disabled");

                                $('.i_5_4_b:nth-child(2)').removeAttr("disabled");
                                $('.i_5_4_c:nth-child(2)').removeAttr("disabled");
                                $('.i_5_4_d:nth-child(2)').removeAttr("disabled");
                                $('.i_5_5_a_value:nth-child(6)').removeAttr("disabled");
                                $('.i_5_5_a_flag_1').removeAttr("disabled");
                                $('.i_5_5_b:nth-child(2)').removeAttr("disabled");
                                $('.i_5_6_a:nth-child(2)').removeAttr("disabled");
                                $('.i_5_6_b:nth-child(2)').removeAttr("disabled");
                                // $('.i_5_6_c_value:nth-child(4)').removeAttr("disabled");
                                $('.i_5_6_c_flag:nth-child(3)').removeAttr("disabled");
                            } else if ($('#i_5_4_a_value').val() > 2) {
                                $('.i_5_4_b:first-child').removeAttr("disabled");
                                $('.i_5_4_c:first-child').removeAttr("disabled");
                                $('.i_5_4_d:first-child').removeAttr("disabled");
                                $('.i_5_5_a_value:first-child').removeAttr("disabled");
                                $('.i_5_5_a_flag_0').removeAttr("disabled");
                                $('.i_5_5_b:first-child').removeAttr("disabled");
                                $('.i_5_6_a:first-child').removeAttr("disabled");
                                $('.i_5_6_b:first-child').removeAttr("disabled");
                                // $('.i_5_6_c_value:nth-child(2)').removeAttr("disabled");
                                $('.i_5_6_c_flag:first-child').removeAttr("disabled");

                                $('.i_5_4_b:nth-child(2)').removeAttr("disabled");
                                $('.i_5_4_c:nth-child(2)').removeAttr("disabled");
                                $('.i_5_4_d:nth-child(2)').removeAttr("disabled");
                                $('.i_5_5_a_value:nth-child(6)').removeAttr("disabled");
                                $('.i_5_5_a_flag_1').removeAttr("disabled");
                                $('.i_5_5_b:nth-child(2)').removeAttr("disabled");
                                $('.i_5_6_a:nth-child(2)').removeAttr("disabled");
                                $('.i_5_6_b:nth-child(2)').removeAttr("disabled");
                                // $('.i_5_6_c_value:nth-child(4)').removeAttr("disabled");
                                $('.i_5_6_c_flag:nth-child(3)').removeAttr("disabled");

                                $('.i_5_4_b:nth-child(3)').removeAttr("disabled");
                                $('.i_5_4_c:nth-child(3)').removeAttr("disabled");
                                $('.i_5_4_d:nth-child(3)').removeAttr("disabled");
                                $('.i_5_5_a_value:nth-child(11)').removeAttr("disabled");
                                $('.i_5_5_a_flag_2').removeAttr("disabled");
                                $('.i_5_5_b:nth-child(3)').removeAttr("disabled");
                                $('.i_5_6_a:nth-child(3)').removeAttr("disabled");
                                $('.i_5_6_b:nth-child(3)').removeAttr("disabled");
                                // $('.i_5_6_c_value:nth-child(6)').removeAttr("disabled");
                                $('.i_5_6_c_flag:nth-child(5)').removeAttr("disabled");
                            }
                        }
                        if ($('.i_5_4_b:first-child').val() != "") {
                            $('.i_5_4_c').parent().parent().removeAttr('style');
                            $('.i_5_4_c:first-child').focus();
                        }
                        if ($('.i_5_4_c:first-child').val() != "") {
                            $('.i_5_4_d').parent().parent().removeAttr('style');
                            $('.i_5_4_d:first-child').focus();
                        }
                        if ($('.i_5_4_d:first-child').val() != "") {
                            $('.i_5_5_a_flag').removeAttr("disabled");
                            $('#i_5_5_a_value').parent().parent().removeAttr('style');
                            $('#i_5_5_a_value').focus();
                        }
                        if ($('#i_5_5_a_value:first-child').val() != "") {
                            $('#i_5_5_b').parent().parent().removeAttr('style');
                            $('#i_5_5_b').focus();
                        }
                        if ($('.i_5_5_a_flag:checked').val() != "" && $('.i_5_5_a_flag:checked').val() !== undefined) {
                            $('#i_5_5_b').parent().parent().removeAttr('style');
                            $('#i_5_5_b').focus();
                        }

                        if ($('.i_5_5_b:first-child').val() != "") {
                            $('.i_5_6_a').parent().parent().removeAttr('style');
                            $('.i_5_6_a:first-child').focus();
                        }
                        if ($('.i_5_6_a:first-child').val() != "") {
                            if ($('.i_5_6_a:first-child').val() == 1) {
                                $('.i_5_6_b').parent().parent().removeAttr('style');
                                $('.i_5_6_b:first-child').focus();
                            } else {
                                $('#d_6_1').removeAttr("disabled");
                                $('#d_6_1').parent().parent().removeAttr('style');
                                //$('.wizard-next').trigger('click');
                            }
                        }
                        if ($('.i_5_6_b:first-child').val() != "") {
                            if ($('.i_5_6_b:first-child').val() == 1) {
                                $('.i_5_6_c_flag').parent().parent().removeAttr('style');
                                $('.i_5_6_c_flag:first-child').focus();
                            } else {
                                $('#d_6_1').removeAttr("disabled");
                                $('#d_6_1').parent().parent().removeAttr('style');
                                //  $('.wizard-next').trigger('click');
                            }
                        }
                        if ($('.i_5_6_c_flag:first-child').val() != "") {
                            if ($('.i_5_6_c_flag:first-child').val() == 77) {
                                $('.i_5_6_c_flag:first-child').next().removeAttr("disabled");
                                $('.i_5_6_c_flag:first-child').next().focus();
                            } else {
                                $('#d_6_1').removeAttr("disabled");
                                $('#d_6_1').parent().parent().removeAttr('style');
                                // $('.wizard-next').trigger('click');
                            }
                        }
                        if ($('.i_5_6_c_value:first-child').val() != "") {
                            $('#d_6_1').removeAttr("disabled");
                            $('#d_6_1').parent().parent().removeAttr('style');
                            //$('.wizard-next').trigger('click');
                        }
                        setTimeout(function () {
                            console.log("section 6")
                            if ($('#d_6_1').val() != "") {
                                $('.d_6_2_flag').removeAttr("disabled");
                                $('#d_6_2_flag').removeAttr("disabled");
                                $('#d_6_2_flag').parent().parent().removeAttr('style');
                                $('#d_6_2_flag').focus();
                            }
                            if ($('#d_6_2_flag').val() != "") {
                                if ($('#d_6_2_flag').val() == 77) {
                                    $('#d_6_2_value').removeAttr("disabled");
                                } else {
                                    $('#d_6_3_flag').removeAttr("disabled");
                                    $('#d_6_3_flag').parent().parent().removeAttr('style');
                                    $('#d_6_3_flag').focus();
                                }
                            }
                            if ($('#d_6_2_value').val() != "") {
                                $('#d_6_3_flag').removeAttr("disabled");
                                $('#d_6_3_flag').parent().parent().removeAttr('style');
                                $('#d_6_3_flag').focus();
                            }
                            if ($('#d_6_3_flag').val() != "") {
                                if ($('#d_6_3_flag').val() == 77) {
                                    $('#d_6_3_value').removeAttr("disabled");
                                    $('#d_6_3_value').focus();
                                } else {
                                    $('#d_6_3_value').attr("disabled", "disabled");
                                    $('.d_6_4').removeAttr("disabled");
                                    $('.d_6_4').parent().parent().removeAttr('style');
                                    $('.d_6_4:first-child').focus();
                                }
                            }
                            if ($('#d_6_3_value').val() != "") {
                                $('.d_6_4').removeAttr("disabled");
                                $('.d_6_4').parent().parent().removeAttr('style');
                                $('.d_6_4:first-child').focus();
                            }
                            if ($('.d_6_4:checked').val() != "" && $('.d_6_4:checked').val() !== undefined) {
                                $('.d_6_5_a_flag').removeAttr("disabled");
                                $('#d_6_5_a_value').removeAttr("disabled");
                                $('#d_6_5_a_value').parent().parent().removeAttr('style');
                                $('#d_6_5_a_value').focus();
                            }
                            if ($('.d_6_5_a_flag:checked').val() != "" && $('.d_6_5_a_flag:checked').val() !== undefined) {
                                $('.d_6_5_b_flag').removeAttr("disabled");
                                $('#d_6_5_b_value').removeAttr("disabled");
                                $('#d_6_5_b_value').parent().parent().removeAttr('style');
                                $('#d_6_5_b_value').focus();
                            }
                            if ($('#d_6_5_a_value').val() != "") {
                                $('.d_6_5_b_flag').removeAttr("disabled");
                                $('#d_6_5_b_value').removeAttr("disabled");
                                $('#d_6_5_b_value').parent().parent().removeAttr('style');
                                $('#d_6_5_b_value').focus();
                            }
                            if ($('.d_6_5_b_flag:checked').val() != "" && $('.d_6_5_b_flag:checked').val() !== undefined) {
                                $('.d_6_5_c_flag').removeAttr("disabled");
                                $('#d_6_5_c_value').removeAttr("disabled");
                                $('#d_6_5_c_value').parent().parent().removeAttr('style');
                                $('#d_6_5_c_value').focus();
                            }
                            if ($('#d_6_5_b_value').val() != "") {
                                $('.d_6_5_c_flag').removeAttr("disabled");
                                $('#d_6_5_c_value').removeAttr("disabled");
                                $('#d_6_5_c_value').parent().parent().removeAttr('style');
                                $('#d_6_5_c_value').focus();
                            }
                        }, 500);
                    }, 500);
                }, 500);
            }, 500);

        }, 500);
        checkSkipLogic();

    }, 2000)
    ///end on init


    $('input').attr("disabled", "disabled");
    $('input').parent().parent().attr('style', 'color:#a6a6a6');
    $('select').attr("disabled", "disabled");
    $('select').parent().parent().attr('style', 'color:#a6a6a6');

    $('.s_0_1').removeAttr("disabled");
    $('.s_0_1').parent().parent().removeAttr('style');
    $('#exampleValidator').removeAttr('style');
    $('#call_status').removeAttr('disabled');
    $('#call_status').parent().parent().removeAttr('style');

    $('.s_0_1').change(function () {
        $('#s_0_2').removeAttr("disabled");
        $('#s_0_2').parent().parent().removeAttr('style');
        $('#s_0_2').focus();
    });
    $('#s_0_2').change(function () {
        if ($('#s_0_2').val() < 18) {
            if (confirm("সাক্ষাৎকার প্রদানের জন্য আপনাকে ধন্যবাদ")) {
                $("#call_status").append('<option value="2" selected="selected">ineligible</option>');
                data_upload(true);
            }
        } else {
            $('.s_0_3').removeAttr("disabled");
            $('.s_0_3').parent().parent().removeAttr('style');
            $('.s_0_3:first-child').focus();
        }
    });
    $('.s_0_3').change(function () {
        if ($(this).val() != 1) {

            if (confirm("সাক্ষাৎকার প্রদানের জন্য আপনাকে ধন্যবাদ")){
                $("#call_status").append('<option value="2" selected="selected">ineligible</option>');
                data_upload(true);
            }
        } else {
            $('.s_0_4').removeAttr("disabled");
            $('.s_0_4').parent().parent().removeAttr('style');
            $('.s_0_4:first-child').focus();
        }
    });
    $('.s_0_4').change(function () {
        if ($(this).val() != 1) {
            if (confirm("সাক্ষাৎকার প্রদানের জন্য আপনাকে ধন্যবাদ")){
                $("#call_status").append('<option value="2" selected="selected">ineligible</option>');
                data_upload(true);
            }
        } else {
            $('.sc_0_1').removeAttr("disabled");
            $('.sc_0_1').parent().parent().removeAttr('style');
            $('.sc_0_1:first-child').focus();
        }
    });
    $('.sc_0_1').change(function () {
        if ($(this).val() != 1) {
            if (confirm("সাক্ষাৎকার প্রদানের জন্য আপনাকে ধন্যবাদ")){
                $("#call_status").append('<option value="2" selected="selected">ineligible</option>');
                data_upload(true);
            }
        } else {
            $('.gi_1_1').removeAttr("disabled");
            $('.gi_1_1').parent().parent().removeAttr('style');
            $('.gi_1_1:first-child').focus();
        }
    });
    $('.gi_1_1').change(function () {
        var mobile_surveillance = {'017':[243,243],'013':[243,243],'019':[112,112],'014':[112,112],'018':[155,155],'016':[155,155],'015':[13,13] };
        var location = window.location.pathname.replace(/^\//g, '').split("/");
        var mobile= $('.surveillance-data div strong').html();
        var gender= $('.gi_1_1:checked').val();
        var noofgender=0;
        $.ajax({
            method: "get",
            async:false,
            url: window.location.protocol+"//"+window.location.hostname+"/"+location[0]+"/"+location[1]+"/poultry/gender/"+mobile.substring(0, 3)+"/"+gender,
        }).success(function( msg ) {
            noofgender=msg;
        });
        if (noofgender >= mobile_surveillance[mobile.substring(0, 3)][gender-1]) {
            if (confirm("নির্বাচিত অপারেটর এর লিঙ্গের সীমা অতিক্রম করেছে (সর্বমোটঃ"+noofgender+")। সাক্ষাৎকার প্রদানের জন্য আপনাকে ধন্যবাদ।")) {
                $("#call_status").append('<option value="2" selected="selected">ineligible</option>');
                data_upload(true);
            }
        } else {
            $('#gi_1_2_a_value').removeAttr("disabled");
            $('.gi_1_2_a_flag').removeAttr("disabled");
            $('#gi_1_2_a_value').parent().parent().parent().removeAttr('style');
            $('#gi_1_2_a_value').parent().parent().parent().parent().removeAttr('style');
            $('#gi_1_2_a_value').focus();
        }
    });
    // $('.gi_1_1').change(function () {
    //
    //     $('#gi_1_2_a_value').removeAttr("disabled");
    //     $('.gi_1_2_a_flag').removeAttr("disabled");
    //     $('#gi_1_2_a_value').parent().parent().parent().removeAttr('style');
    //     $('#gi_1_2_a_value').parent().parent().parent().parent().removeAttr('style');
    //     $('#gi_1_2_a_value').focus();
    //
    // });
    $('#gi_1_2_a_value').change(function () {

        $('#gi_1_2_b_value').removeAttr("disabled");
        $('.gi_1_2_b_flag').removeAttr("disabled");
        $('#gi_1_2_b_value').parent().parent().parent().parent().removeAttr('style');
        $('#gi_1_2_b_value').parent().parent().parent().removeAttr('style');
        $('#gi_1_2_b_value').focus();

    });
    $('.gi_1_2_a_flag').change(function () {

        $('#gi_1_2_b_value').removeAttr("disabled");
        $('.gi_1_2_b_flag').removeAttr("disabled");
        $('#gi_1_2_b_value').parent().parent().parent().parent().removeAttr('style');
        $('#gi_1_2_b_value').parent().parent().parent().removeAttr('style');
        $('#gi_1_2_b_value').focus();

    });
    $('#gi_1_2_b_value').change(function () {

        $('.pp_2_1_a').removeAttr("disabled");
        $('.pp_2_1_a').parent().parent().removeAttr('style');
        $('.wizard-next').trigger('click');

    });
    $('.gi_1_2_b_flag').change(function () {

        $('.pp_2_1_a').removeAttr("disabled");
        $('.pp_2_1_a').parent().parent().removeAttr('style');
        $('.wizard-next').trigger('click');
    });




    $('.pp_2_1_a').change(function () {
        if ($(this).val() != 1) {
            $('.pp_2_15_a').removeAttr("disabled");
            $('.pp_2_15_a').parent().parent().removeAttr('style');
            $('.pp_2_15_a:first-child').focus();
        } else {
            $('#pp_2_1_b_flag').removeAttr("disabled");
            $('#pp_2_1_b_flag').parent().parent().removeAttr('style');
            $('#pp_2_1_b_flag').focus();
        }
    });
    $('#pp_2_1_b_flag').change(function () {
        if ($('#pp_2_1_b_flag').val() == 77) {
            $('#pp_2_1_b_value').removeAttr("disabled");
            $('#pp_2_1_b_value').focus();
        } else {
            $('#pp_2_2_value').removeAttr("disabled");
            $('.pp_2_2_flag').removeAttr("disabled");
            $('#pp_2_2_value').parent().parent().parent().parent().removeAttr('style');
            $('#pp_2_2_value').parent().parent().parent().removeAttr('style');
            $('#pp_2_2_value').focus();

            $('#pp_2_1_b_value').val("");
            $('#pp_2_1_b_value').attr("disabled", "disabled");
        }
    });
    $("#pp_2_1_b_value").change(function () {
        $('#pp_2_2_value').removeAttr("disabled");
        $('.pp_2_2_flag').removeAttr("disabled");
        $('#pp_2_2_value').parent().parent().parent().parent().removeAttr('style');
        $('#pp_2_2_value').parent().parent().parent().removeAttr('style');
        $('#pp_2_2_value').focus();
    });

    $('#pp_2_2_value').change(function () {

        $('.pp_2_3_a').removeAttr("disabled");
        $('.pp_2_3_a').parent().parent().removeAttr('style');
        $('.pp_2_3_a:first-child').focus();

    });
    $('.pp_2_2_flag').change(function () {
        $('.pp_2_3_a').removeAttr("disabled");
        $('.pp_2_3_a').parent().parent().removeAttr('style');
        $('.pp_2_3_a:first-child').focus();
    });

    $('.pp_2_3_a').change(function () {
        if ($(this).val() != 1) {

            $('#pp_2_3_b_value').val("");
            $('#pp_2_3_b_value').attr("disabled", "disabled");
            $('.pp_2_3_b_flag').attr("disabled", "disabled");
            $('#pp_2_3_b_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');

            $('#pp_2_4_value').removeAttr("disabled");
            $('.pp_2_4_flag').removeAttr("disabled");
            $('#pp_2_4_value').parent().parent().parent().parent().removeAttr('style');
            $('#pp_2_4_value').parent().parent().parent().removeAttr('style');
            $('#pp_2_4_value').focus();
        } else {
            $('#pp_2_3_b_value').removeAttr("disabled");
            $('.pp_2_3_b_flag').removeAttr("disabled");
            $('#pp_2_3_b_value').parent().parent().parent().parent().removeAttr('style');
            $('#pp_2_3_b_value').parent().parent().parent().removeAttr('style');
            $('#pp_2_3_b_value').focus();
        }
    });

    $('#pp_2_3_b_value').change(function () {
        $('#pp_2_4_value').removeAttr("disabled");
        $('.pp_2_4_flag').removeAttr("disabled");
        $('#pp_2_4_value').parent().parent().parent().parent().removeAttr('style');
        $('#pp_2_4_value').parent().parent().parent().removeAttr('style');
        $('#pp_2_4_value').focus();
    });
    $('.pp_2_3_b_flag').change(function () {
        $('#pp_2_4_value').removeAttr("disabled");
        $('.pp_2_4_flag').removeAttr("disabled");
        $('#pp_2_4_value').parent().parent().parent().parent().removeAttr('style');
        $('#pp_2_4_value').parent().parent().parent().removeAttr('style');
        $('#pp_2_4_value').focus();
    });

    $('#pp_2_4_value').change(function () {
        $('#pp_2_5_value').removeAttr("disabled");
        $('.pp_2_5_flag').removeAttr("disabled");
        $('#pp_2_5_value').parent().parent().removeAttr('style');
        $('#pp_2_5_value').focus();
    });
    $('.pp_2_4_flag').change(function () {
        $('#pp_2_5_value').removeAttr("disabled");
        $('.pp_2_5_flag').removeAttr("disabled");
        $('#pp_2_5_value').parent().parent().removeAttr('style');
        $('#pp_2_5_value').focus();
    });
    $('#pp_2_5_value').change(function () {
        $('.pp_2_6_a').removeAttr("disabled");
        $('.pp_2_6_a').parent().parent().removeAttr('style');
        $('.pp_2_6_a:first-child').focus();
    });
    $('.pp_2_5_flag').change(function () {
        $('.pp_2_6_a').removeAttr("disabled");
        $('.pp_2_6_a').parent().parent().removeAttr('style');
        $('.pp_2_6_a:first-child').focus();
    });
    $('.pp_2_6_a').change(function () {
        if ($(this).val() != 1) {

            $('#pp_2_7_a_value').removeAttr("disabled");
            $('.pp_2_7_a_flag').removeAttr("disabled");
            $('#pp_2_7_a_value').parent().parent().removeAttr('style');
            $('#pp_2_7_a_value').focus();
            $('#pp_2_6_b').val("")
            $('#pp_2_6_b').attr("disabled", "disabled");
            $('#pp_2_6_b').parent().parent().attr('style', 'color:#a6a6a6');
        } else {
            $('#pp_2_6_b').removeAttr("disabled");
            $('#pp_2_6_b').parent().parent().removeAttr('style');
            $('#pp_2_6_b').focus();
        }
    });
    $('.pp_2_6_b').change(function () {
        $('.pp_2_6_b').next().removeAttr("disabled");
        $('#pp_2_7_a_value').removeAttr("disabled");
        $('.pp_2_7_a_flag').removeAttr("disabled");
        $('#pp_2_7_a_value').parent().parent().removeAttr('style');
        $('#pp_2_7_a_value').focus();
    });
    $('#pp_2_7_a_value').change(function () {
        $('.pp_2_7_b').removeAttr("disabled");
        $('.pp_2_7_b').parent().parent().removeAttr('style');
        $('.pp_2_7_b:first-child').focus();
    });
    $('.pp_2_7_a_flag').change(function () {
        $('.pp_2_7_b').removeAttr("disabled");
        $('.pp_2_7_b').parent().parent().removeAttr('style');
        $('.pp_2_7_b:first-child').focus();
    });

    $('.pp_2_7_b').change(function () {
        if ($(this).val() != 0) {
            $('#pp_2_11_a').focus();
            $('#pp_2_11_a').removeAttr("disabled");
            $('#pp_2_11_a').parent().parent().removeAttr('style');
            $('#pp_2_11_a').focus();
            $('#pp_2_7_c_value').attr("disabled", "disabled");
            $('.pp_2_7_c_flag').attr("disabled", "disabled");
            $('#pp_2_7_c_value').parent().parent().parent().parent().attr('style', 'color:#a6a6a6');
        } else {
            $('#pp_2_7_c_value').removeAttr("disabled");
            $('.pp_2_7_c_flag').removeAttr("disabled");
            $('#pp_2_7_c_value').parent().parent().parent().parent().removeAttr('style');
            $('#pp_2_7_c_value').parent().parent().parent().removeAttr('style');
            $('#pp_2_7_c_value').focus();
        }
    });
    $('#pp_2_7_c_value').change(function () {
        $('.pp_2_8_a').removeAttr("disabled");
        $('.pp_2_8_a').parent().parent().removeAttr('style');
        $('.pp_2_8_a:first-child').focus();
    });
    $('.pp_2_7_c_flag').change(function () {
        $('.pp_2_8_a').removeAttr("disabled");
        $('.pp_2_8_a').parent().parent().removeAttr('style');
        $('.pp_2_8_a').parent().parent().removeAttr('style');
        $('.pp_2_8_a:first-child').focus();
    });

    $('.pp_2_8_a').change(function () {
        if ($(this).val() != 1) {
            $('#pp_2_9_value').removeAttr("disabled");
            $('.pp_2_9_flag').removeAttr("disabled");
            $('#pp_2_9_value').parent().parent().parent().parent().removeAttr('style');
            $('#pp_2_9_value').parent().parent().parent().removeAttr('style');
            $('#pp_2_9_value').focus();
        } else {
            $('#pp_2_8_b_value').removeAttr("disabled");
            $('.pp_2_8_b_flag').removeAttr("disabled");
            $('#pp_2_8_b_value').parent().parent().parent().removeAttr('style');
            $('#pp_2_8_b_value').parent().parent().parent().parent().removeAttr('style');
            $('#pp_2_8_b_value').focus();
        }
    });

    $('#pp_2_8_b_value').change(function () {
        $('#pp_2_9_value').removeAttr("disabled");
        $('.pp_2_9_flag').removeAttr("disabled");
        $('#pp_2_9_value').parent().parent().parent().removeAttr('style');
        $('#pp_2_9_value').parent().parent().parent().parent().removeAttr('style');
        $('#pp_2_9_value').focus();
    });
    $('.pp_2_8_b_flag').change(function () {
        $('#pp_2_9_value').removeAttr("disabled");
        $('.pp_2_9_flag').removeAttr("disabled");
        $('#pp_2_9_value').parent().parent().parent().parent().removeAttr('style');
        $('#pp_2_9_value').parent().parent().parent().removeAttr('style');
        $('#pp_2_9_value').focus();
    });

    $('#pp_2_9_value').change(function () {
        $('#pp_2_10_value').removeAttr("disabled");
        $('.pp_2_10_flag').removeAttr("disabled");
        $('#pp_2_10_value').parent().parent().removeAttr('style');
        $('#pp_2_10_value').focus();
    });
    $('.pp_2_9_flag').change(function () {
        $('#pp_2_10_value').removeAttr("disabled");
        $('.pp_2_10_flag').removeAttr("disabled");
        $('#pp_2_10_value').parent().parent().removeAttr('style');
        $('#pp_2_10_value').focus();
    });

    $('#pp_2_10_value').change(function () {
        $('#pp_2_11_a').removeAttr("disabled");
        $('#pp_2_11_a').parent().parent().removeAttr('style');
        $('#pp_2_11_a').focus();
    });
    $('.pp_2_10_flag').change(function () {
        $('#pp_2_11_a').removeAttr("disabled");
        $('#pp_2_11_a').parent().parent().removeAttr('style');
        $('#pp_2_11_a').focus();
    });
    $('#pp_2_11_a').change(function () {
        $('#pp_2_11_b').removeAttr("disabled");
        $('#pp_2_11_b').parent().parent().removeAttr('style');
        $('#pp_2_11_b').focus();
    });
    $('#pp_2_11_b').change(function () {
        $('#pp_2_11_c').removeAttr("disabled");
        $('#pp_2_11_c').parent().parent().removeAttr('style');
        $('#pp_2_11_c').focus();
    });
    $('#pp_2_11_c').change(function () {
        $('#pp_2_11_d').removeAttr("disabled");
        $('#pp_2_11_d').parent().parent().removeAttr('style');
        $('#pp_2_11_d').focus();
    });
    $('#pp_2_11_d').change(function () {
        $('.pp_2_12_a').removeAttr("disabled");
        $('.pp_2_12_a').parent().parent().removeAttr('style');
        $('.pp_2_12_a:first-child').focus();
    });
    $('.pp_2_12_a').change(function () {
        if ($(this).val() != 1) {
            $('.pp_2_13_a').removeAttr("disabled");
            $('.pp_2_13_a').parent().parent().removeAttr('style');
            $('.pp_2_13_a:first-child').focus();
        } else {
            $('#pp_2_12_b').removeAttr("disabled");
            $('#pp_2_12_b').parent().parent().removeAttr('style');
            $('#pp_2_12_b').focus();
        }
    });

    $('#pp_2_12_b').change(function () {
        $('.pp_2_13_a').removeAttr("disabled");
        $('.pp_2_13_a').parent().parent().removeAttr('style');
        $('.pp_2_13_a:first-child').focus();
    });
    $('.pp_2_13_a').change(function () {
        if ($(this).val() != 1) {
            $('#pp_2_14_a_flag').removeAttr("disabled");
            $('#pp_2_14_a_flag').parent().parent().removeAttr('style');
            $('#pp_2_14_a_flag').focus();
        } else {
            $('#pp_2_13_b').removeAttr("disabled");
            $('#pp_2_13_b').parent().parent().removeAttr('style');
            $('#pp_2_13_b').focus();
        }
    });
    $('#pp_2_13_b').change(function () {
        $('#pp_2_14_a_flag').removeAttr("disabled");
        $('#pp_2_14_a_flag').parent().parent().removeAttr('style');
        $('#pp_2_14_a_flag').focus();
    });
    $('#pp_2_14_a_flag').change(function () {
        if ($(this).val() == 77) {
            $('#pp_2_14_a_value').removeAttr("disabled");
            $('#pp_2_14_a_value').focus();
        }
        else if ($(this).val() == 2 || $(this).val() == 88 || $(this).val() == 99) {
            $('#pp_2_14_a_value').attr("disabled", "disabled");
            $('.pfp_3_1_a').removeAttr("disabled");
            $('.pfp_3_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
            // goto section 3//$('#pp_2_14_a').focus();
        } else {
            $('#pp_2_14_a_value').attr("disabled", "disabled");
            $('#pp_2_14_b_flag').removeAttr("disabled");
            $('#pp_2_14_b_flag').parent().parent().removeAttr('style');
            $('#pp_2_14_b_flag').focus();
        }
    });
    $('#pp_2_14_a_value').change(function () {
        $('.pfp_3_1_a').removeAttr("disabled");
        $('.pfp_3_1_a').parent().parent().removeAttr('style');
        $('.wizard-next').trigger('click');
    });
    $('#pp_2_14_b_flag').change(function () {
        if ($(this).val() == 77) {
            $('#pp_2_14_b_value').removeAttr("disabled");
            $('#pp_2_14_b_value').focus();
        } else if ($('.pp_2_1_a:checked').val() == 0) {
            $('#pp_2_14_b_value').val("");
            $('#pp_2_14_b_value').attr("disabled", "disabled");
            $('.pp_2_15_a').removeAttr("disabled");
            $('.pp_2_15_a').parent().parent().removeAttr('style');
            $('.pp_2_15_a:first-child').focus();
        } else {
            $('.pfp_3_1_a').removeAttr("disabled");
            $('.pfp_3_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });
    $('#pp_2_14_b_value').change(function () {
        if ($('.pp_2_1_a:checked').val() == 0) {
            $('.pp_2_15_a').removeAttr("disabled");
            $('.pp_2_15_a').parent().parent().removeAttr('style');
            $('.pp_2_15_a:first-child').focus();
        } else {
            $('.pfp_3_1_a').removeAttr("disabled");
            $('.pfp_3_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }

    });
    $('.pp_2_15_a').change(function () {
        if ($(this).val() == 1) {
            $('#pp_2_15_b').removeAttr("disabled");
            $('#pp_2_15_b').parent().parent().removeAttr('style');
            $('#pp_2_15_b:first-child').focus();
        } else {
            $('#pp_2_16_a_flag').removeAttr("disabled");
            $('#pp_2_16_a_flag').parent().parent().removeAttr('style');
            $('#pp_2_16_a_flag').focus();
        }

    });
    $('.pp_2_15_b').change(function () {
        $('.pp_2_15_b').next().removeAttr("disabled");
        $('.pp_2_15_c_flag').removeAttr("disabled");
        $('#pp_2_15_c_flag').parent().parent().removeAttr('style');
        $('#pp_2_15_c_flag').focus();
    });
    $('.pp_2_15_c_flag').change(function () {
        $('.pp_2_15_c_flag').removeAttr("disabled");
        if ($(this).val() == 77) {
            $(this).next().removeAttr("disabled");
            $(this).next().focus();
        } else {
            $('.pfp_3_1_a').removeAttr("disabled");
            $('.pfp_3_1_a').parent().parent().removeAttr('style');
           // $('.wizard-next').trigger('click');
        }
    });
    $('.pp_2_15_c_value').change(function () {
        $('.pfp_3_1_a').removeAttr("disabled");
        $('.pfp_3_1_a').parent().parent().removeAttr('style');
        //$('.wizard-next').trigger('click');
    });
    $('#pp_2_16_a_flag').change(function () {
        if ($(this).val() == 77) {
            $('#pp_2_16_a_value').removeAttr("disabled");
            $('#pp_2_16_a_value').focus();
        }else if ($(this).val() == 1) {
            $('#pp_2_16_b_flag').removeAttr("disabled");
            $('#pp_2_16_b_flag').parent().parent().removeAttr('style');
            $('#pp_2_16_b_flag:first-child').focus();
        } else {
            $('.pfp_3_1_a').removeAttr("disabled");
            $('.pfp_3_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });
    $('#pp_2_16_a_value').change(function () {
        $('.pfp_3_1_a').removeAttr("disabled");
        $('.pfp_3_1_a').parent().parent().removeAttr('style');
        $('.wizard-next').trigger('click');
    });
    $('#pp_2_16_b_flag').change(function () {
        if ($(this).val() == 77) {
            $('#pp_2_16_b_value').removeAttr("disabled");
            $('#pp_2_16_b_value').focus();
        } else {
            $('#pp_2_16_b_value').attr("disabled", "disabled");
            $('.pfp_3_1_a').removeAttr("disabled");
            $('.pfp_3_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });

    $('#pp_2_16_b_value').change(function () {
        $('.pfp_3_1_a').removeAttr("disabled");
        $('.pfp_3_1_a').parent().parent().removeAttr('style');
        $('.wizard-next').trigger('click');
    });
    $('.pfp_3_1_a').change(function () {
        if ($(this).val() == 1) {
            $('.pfp_3_1_b').removeAttr("disabled");
            $('.pfp_3_1_b').parent().parent().removeAttr('style');
            $('.pfp_3_1_b:first-child').focus();
        } else {
            if ($('#pp_2_14_a_flag').val() == 1) {
                $('.pfp_3_1_d').removeAttr("disabled");
                $('.pfp_3_1_d').parent().parent().removeAttr('style');
                $('.pfp_3_1_d:first-child').focus();
            } else {
                $('.pfp_3_2_a').removeAttr("disabled");
                $('.pfp_3_2_a').parent().parent().removeAttr('style');
                $('.pfp_3_2_a:first-child').focus();
            }
        }
    });
    $('.pfp_3_1_b').change(function () {
        if ($(this).val() == 1) {
            $('#pfp_3_1_c').removeAttr("disabled");
            $('#pfp_3_1_c').parent().parent().removeAttr('style');
            $('#pfp_3_1_c').focus();
        } else {
            $('.pfp_3_2_a').removeAttr("disabled");
            $('.pfp_3_2_a').parent().parent().removeAttr('style');
            $('.pfp_3_2_a:first-child').focus();
        }
    });
    $('.pfp_3_1_c').change(function () {
        $('.pfp_3_1_c').next().removeAttr("disabled");
        if ($('#pp_2_14_a_flag').val() == 1) {
            $('.pfp_3_1_d').removeAttr("disabled");
            $('.pfp_3_1_d').parent().parent().removeAttr('style');
            $('.pfp_3_1_d:first-child').focus();
        } else {
            $('.pfp_3_2_a').removeAttr("disabled");
            $('.pfp_3_2_a').parent().parent().removeAttr('style');
            $('.pfp_3_2_a:first-child').focus();
        }
    });
    $('.pfp_3_1_d').change(function () {
        $('.pfp_3_2_a').removeAttr("disabled");
        $('.pfp_3_2_a').parent().parent().removeAttr('style');
        $('.pfp_3_2_a:first-child').focus();
    });
    $('.pfp_3_2_a').change(function () {
        if ($(this).val() == 1) {
            $('#pfp_3_2_b_flag').removeAttr("disabled");
            $('#pfp_3_2_b_flag').parent().parent().removeAttr('style');
            $('#pfp_3_2_b_flag').focus();
        } else {
            if ($('#pp_2_14_a_flag').val() == 1) {
                $('.pfp_3_2_e').removeAttr("disabled");
                $('.pfp_3_2_e').parent().parent().removeAttr('style');
                $('.pfp_3_2_e:first-child').focus();
            } else {
                $('.pfp_3_3_a').removeAttr("disabled");
                $('.pfp_3_3_a').parent().parent().removeAttr('style');
                $('.pfp_3_3_a:first-child').focus();
            }
        }
    });
    $('#pfp_3_2_b_flag').change(function () {
        if ($(this).val() == 77) {
            $('#pfp_3_2_b_value').removeAttr("disabled");
            $('#pfp_3_2_b_value').focus();
        } else {
            $('.pfp_3_2_c').removeAttr("disabled");
            $('.pfp_3_2_c').parent().parent().removeAttr('style');
            $('.pfp_3_2_c:first-child').focus();
        }
    });
    $('#pfp_3_2_b_value').change(function () {
        $('.pfp_3_2_c').removeAttr("disabled");
        $('.pfp_3_2_c').parent().parent().removeAttr('style');
        $('.pfp_3_2_c:first-child').focus();
    });

    $('.pfp_3_2_c').change(function () {
        if ($(this).val() == 1) {
            $('#pfp_3_2_d').removeAttr("disabled");
            $('#pfp_3_2_d').parent().parent().removeAttr('style');
            $('#pfp_3_2_d').focus();
        } else {
            $('.pfp_3_3_a').removeAttr("disabled");
            $('.pfp_3_3_a').parent().parent().removeAttr('style');
            $('.pfp_3_3_a:first-child').focus();
        }
    });
    $('.pfp_3_2_d').change(function () {
        $('.pfp_3_2_d').next().removeAttr("disabled");
        if ($('#pp_2_14_a_flag').val() == 1) {
            $('.pfp_3_2_e').removeAttr("disabled");
            $('.pfp_3_2_e').parent().parent().removeAttr('style');
            $('.pfp_3_2_e:first-child').focus();
        } else {
            $('.pfp_3_3_a').removeAttr("disabled");
            $('.pfp_3_3_a').parent().parent().removeAttr('style');
            $('.pfp_3_3_a:first-child').focus();
        }
    });
    $('.pfp_3_2_e').change(function () {
        if ($(this).val() == 1) {
            $('#pfp_3_2_f_flag').removeAttr("disabled");
            $('#pfp_3_2_f_flag').parent().parent().removeAttr('style');
            $('#pfp_3_2_f_flag').focus();
        } else {
            $('.pfp_3_3_a').removeAttr("disabled");
            $('.pfp_3_3_a').parent().parent().removeAttr('style');
            $('.pfp_3_3_a:first-child').focus();
        }
    });
    $('#pfp_3_2_f_flag').change(function () {
        if ($(this).val() == 77) {
            $('#pfp_3_2_f_value').removeAttr("disabled");
            $('#pfp_3_2_f_value').focus();
        } else {
            $('.pfp_3_3_a').removeAttr("disabled");
            $('.pfp_3_3_a').parent().parent().removeAttr('style');
            $('.pfp_3_3_a:first-child').focus();
        }
    });
    $('#pfp_3_2_f_value').change(function () {
        $('.pfp_3_3_a').removeAttr("disabled");
        $('.pfp_3_3_a').parent().parent().removeAttr('style');
        $('.pfp_3_3_a:first-child').focus();
    });
    $('.pfp_3_3_a').change(function () {
        if ($(this).val() == 1) {
            $('.pfp_3_3_b').removeAttr("disabled");
            $('.pfp_3_3_b').parent().parent().removeAttr('style');
            $('.pfp_3_3_b:first-child').focus();
        } else {
            if ($('#pp_2_14_a_flag').val() == 1) {
                $('.pfp_3_3_d').removeAttr("disabled");
                $('.pfp_3_3_d').parent().parent().removeAttr('style');
                $('.pfp_3_3_d:first-child').focus();
            } else {
                $('.pfp_3_4_a').removeAttr("disabled");
                $('.pfp_3_4_a').parent().parent().removeAttr('style');
                $('.pfp_3_4_a:first-child').focus();
            }
        }
    });

    $('.pfp_3_3_b').change(function () {
        if ($(this).val() == 1) {
            $('#pfp_3_3_c').removeAttr("disabled");
            $('#pfp_3_3_c').parent().parent().removeAttr('style');
            $('#pfp_3_3_c').focus();
        } else {
            $('.pfp_3_4_a').removeAttr("disabled");
            $('.pfp_3_4_a').parent().parent().removeAttr('style');
            $('.pfp_3_4_a:first-child').focus();
        }
    });
    $('.pfp_3_3_c').change(function () {
        $('.pfp_3_3_c').next().removeAttr("disabled");
        if ($('#pp_2_14_a_flag').val() == 1) {
            $('.pfp_3_3_d').removeAttr("disabled");
            $('.pfp_3_3_d').parent().parent().removeAttr('style');
            $('.pfp_3_3_d:first-child').focus();
        } else {
            $('.pfp_3_4_a').removeAttr("disabled");
            $('.pfp_3_4_a').parent().parent().removeAttr('style');
            $('.pfp_3_4_a:first-child').focus();
        }
    });
    $('.pfp_3_3_d').change(function () {
        $('.pfp_3_4_a').removeAttr("disabled");
        $('.pfp_3_4_a').parent().parent().removeAttr('style');
        $('.pfp_3_4_a:first-child').focus();
    });

    $('.pfp_3_4_a').change(function () {
        if ($(this).val() == 1) {
            $('.pfp_3_4_b').removeAttr("disabled");
            $('.pfp_3_4_b').parent().parent().removeAttr('style');
            $('.pfp_3_4_b:first-child').focus();
        } else {
            if ($('.pp_2_1_a:checked').val() == 1) {
                $('.pm_4_1_a').removeAttr("disabled");
                $('.pm_4_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            } else if ($('.pfp_3_1_a:checked').val() == 1) {
                $('.pm_4_4_a').removeAttr("disabled");
                $('.pm_4_4_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_4_a:first-child').focus();
            } else if ($('.pfp_3_2_a:checked').val() == 1) {
                $('.pm_4_5_a').removeAttr("disabled");
                $('.pm_4_5_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_5_a:first-child').focus();
            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                $('.pm_4_6_a').removeAttr("disabled");
                $('.pm_4_6_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_6_a:first-child').focus();
            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                setTimeout(function () {
                    $('.wizard-next').trigger('click');
                }, 1000);
            }
        }
    });
    $('.pfp_3_4_b').change(function () {
        if ($(this).val() == 1) {
            $('#pfp_3_4_c').removeAttr("disabled");
            $('#pfp_3_4_c').parent().parent().removeAttr('style');
            $('#pfp_3_4_c').focus();
        } else {
            if ($('.pp_2_1_a:checked').val() == 1) {
                $('.pm_4_1_a').removeAttr("disabled");
                $('.pm_4_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            } else if ($('.pfp_3_1_a:checked').val() == 1) {
                $('.pm_4_4_a').removeAttr("disabled");
                $('.pm_4_4_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_4_a:first-child').focus();
            } else if ($('.pfp_3_2_a:checked').val() == 1) {
                $('.pm_4_5_a').removeAttr("disabled");
                $('.pm_4_5_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_5_a:first-child').focus();
            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                $('.pm_4_6_a').removeAttr("disabled");
                $('.pm_4_6_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_6_a:first-child').focus();
            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
                setTimeout(function () {
                    $('.wizard-next').trigger('click');
                }, 1000);
            }
        }
    });
    $('.pfp_3_4_c').change(function () {
        $('.pfp_3_4_c').next().removeAttr("disabled");
        if ($('.pp_2_1_a:checked').val() == 1) {
            $('.pm_4_1_a').removeAttr("disabled");
            $('.pm_4_1_a').parent().parent().removeAttr('style');
            //  $('.wizard-next').trigger('click');
        } else if ($('.pfp_3_1_a:checked').val() == 1) {
            $('.pm_4_4_a').removeAttr("disabled");
            $('.pm_4_4_a').parent().parent().removeAttr('style');
            //$('.wizard-next').trigger('click');
            $('.pm_4_4_a:first-child').focus();
        } else if ($('.pfp_3_2_a:checked').val() == 1) {
            $('.pm_4_5_a').removeAttr("disabled");
            $('.pm_4_5_a').parent().parent().removeAttr('style');
            //$('.wizard-next').trigger('click');
            $('.pm_4_5_a:first-child').focus();
        } else if ($('.pfp_3_3_a:checked').val() == 1) {
            $('.pm_4_6_a').removeAttr("disabled");
            $('.pm_4_6_a').parent().parent().removeAttr('style');
            // $('.wizard-next').trigger('click');
            $('.pm_4_6_a:first-child').focus();
        } else if ($('.pfp_3_4_a:checked').val() == 1) {
            $('.pm_4_7_a').removeAttr("disabled");
            $('.pm_4_7_a').parent().parent().removeAttr('style');
            // $('.wizard-next').trigger('click');
            $('.pm_4_7_a:first-child').focus();
        } else {
            $('.i_5_1_a').removeAttr("disabled");
            $('.i_5_1_a').parent().parent().removeAttr('style');
            // $('.wizard-next').trigger('click');
            // setTimeout(function () {
            //     $('.wizard-next').trigger('click');
            // }, 1000);
        }
    });

    $('.pm_4_1_a').change(function () {
        if ($('.pm_4_1_a:checked').val() == 1) {
            $('#pm_4_1_b').removeAttr("disabled");
            $('#pm_4_1_b').parent().parent().removeAttr('style');
            $('#pm_4_1_b').focus();
        } else {
            $('.pm_4_2_a').removeAttr("disabled");
            $('.pm_4_2_a').parent().parent().removeAttr('style');
            $('.pm_4_2_a:first-child').focus();
        }
    });
    $('#pm_4_1_b').change(function () {
        $('.pm_4_2_a').removeAttr("disabled");
        $('.pm_4_2_a').parent().parent().removeAttr('style');
        $('.pm_4_2_a:first-child').focus();
    });
    $('.pm_4_2_a').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_2_b').removeAttr("disabled");
            $('#pm_4_2_b').parent().parent().removeAttr('style');
            $('#pm_4_2_b').focus();
        } else {
            if ($('.pp_2_1_a:checked').val() == 1) {
                $('.pm_4_3_a').removeAttr("disabled");
                $('.pm_4_3_a').parent().parent().removeAttr('style');
                $('.pm_4_3_a').focus();
            } else {
                $('#pm_4_3_b').removeAttr("disabled");
                $('#pm_4_3_b').parent().parent().removeAttr('style');
                $('#pm_4_3_b').focus();
            }
        }
    });

    $('#pm_4_2_b').change(function () {
        $('.pm_4_2_c').removeAttr("disabled");
        $('.pm_4_2_c').parent().parent().removeAttr('style');
        $('.pm_4_2_c:first-child').focus();
    });
    $('.pm_4_2_c').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_2_d').removeAttr("disabled");
            $('#pm_4_2_d').parent().parent().removeAttr('style');
            $('#pm_4_2_d').focus();
        } else {
            if ($('.pp_2_1_a:checked').val() == 1) {
                $('.pm_4_3_a').removeAttr("disabled");
                $('.pm_4_3_a').parent().parent().removeAttr('style');
                $('.pm_4_3_a:first-child').focus();
            } else {
                $('#pm_4_3_b').removeAttr("disabled");
                $('#pm_4_3_b').parent().parent().removeAttr('style');
                $('#pm_4_3_b').focus();
            }
        }
    });
    $('#pm_4_2_d').change(function () {
        if ($('.pp_2_1_a:checked').val() == 1) {
            $('.pm_4_3_a').removeAttr("disabled");
            $('.pm_4_3_a').parent().parent().removeAttr('style');
            $('.pm_4_3_a:first-child').focus();
        } else {
            $('#pm_4_3_b').removeAttr("disabled");
            $('#pm_4_3_b').parent().parent().removeAttr('style');
            $('#pm_4_3_b').focus();
        }
    });
    $('.pm_4_3_a').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_3_b').removeAttr("disabled");
            $('#pm_4_3_b').parent().parent().removeAttr('style');
            $('#pm_4_3_b').focus();
        } else {
            if ($('.pfp_3_1_a:checked').val() == 1) {
                $('.pm_4_4_a').removeAttr("disabled");
                $('.pm_4_4_a').parent().parent().removeAttr('style');
                $('.pm_4_4_a:first-child').focus();
            } else if ($('.pfp_3_2_a:checked').val() == 1) {
                $('.pm_4_5_a').removeAttr("disabled");
                $('.pm_4_5_a').parent().parent().removeAttr('style');
                $('.pm_4_5_a:first-child').focus();
            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                $('.pm_4_6_a').removeAttr("disabled");
                $('.pm_4_6_a').parent().parent().removeAttr('style');
                $('.pm_4_6_a:first-child').focus();
            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
        }
    });

    $('#pm_4_3_b').change(function () {
        if ($('.pfp_3_1_a:checked').val() == 1) {
            $('.pm_4_4_a').removeAttr("disabled");
            $('.pm_4_4_a').parent().parent().removeAttr('style');
            $('.pm_4_4_a:first-child').focus();
        } else if ($('.pfp_3_2_a:checked').val() == 1) {
            $('.pm_4_5_a').removeAttr("disabled");
            $('.pm_4_5_a').parent().parent().removeAttr('style');
            $('.pm_4_5_a:first-child').focus();
        } else if ($('.pfp_3_3_a:checked').val() == 1) {
            $('.pm_4_6_a').removeAttr("disabled");
            $('.pm_4_6_a').parent().parent().removeAttr('style');
            $('.pm_4_6_a:first-child').focus();
        } else if ($('.pfp_3_4_a:checked').val() == 1) {
            $('.pm_4_7_a').removeAttr("disabled");
            $('.pm_4_7_a').parent().parent().removeAttr('style');
            $('.pm_4_7_a:first-child').focus();
        } else {
            $('.i_5_1_a').removeAttr("disabled");
            $('.i_5_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });

    $('.pm_4_4_a').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_4_b').removeAttr("disabled");
            $('#pm_4_4_b').parent().parent().removeAttr('style');
            $('#pm_4_4_b').focus();
        } else {
            $('.pm_4_4_c').removeAttr("disabled");
            $('.pm_4_4_c').parent().parent().removeAttr('style');
            $('.pm_4_4_c:first-child').focus();
        }
    });
    $('#pm_4_4_b').change(function () {
        $('.pm_4_4_c').removeAttr("disabled");
        $('.pm_4_4_c').parent().parent().removeAttr('style');
        $('.pm_4_4_c:first-child').focus();
    });
    $('.pm_4_4_c').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_4_d').removeAttr("disabled");
            $('#pm_4_4_d').parent().parent().removeAttr('style');
            $('#pm_4_4_d').focus();
        } else {
            $('.pm_4_4_e').removeAttr("disabled");
            $('.pm_4_4_e').parent().parent().removeAttr('style');
            $('.pm_4_4_e:first-child').focus();
        }
    });
    $('#pm_4_4_d').change(function () {
        $('.pm_4_4_e').removeAttr("disabled");
        $('.pm_4_4_e').parent().parent().removeAttr('style');
        $('.pm_4_4_e:first-child').focus();
    });
    $('.pm_4_4_e').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_4_f').removeAttr("disabled");
            $('#pm_4_4_f').parent().parent().removeAttr('style');
            $('#pm_4_4_f').focus();
        } else {
            $('.pm_4_4_g').removeAttr("disabled");
            $('.pm_4_4_g').parent().parent().removeAttr('style');
            $('.pm_4_4_g:first-child').focus();
        }
    });
    $('#pm_4_4_f').change(function () {
        $('.pm_4_4_g').removeAttr("disabled");
        $('.pm_4_4_g').parent().parent().removeAttr('style');
        $('.pm_4_4_g:first-child').focus();
    });
    $('.pm_4_4_g').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_4_h').removeAttr("disabled");
            $('#pm_4_4_h').parent().parent().removeAttr('style');
            $('#pm_4_4_h').focus();
        } else {
            if ($('.pfp_3_2_a:checked').val() == 1) {
                $('.pm_4_5_a').removeAttr("disabled");
                $('.pm_4_5_a').parent().parent().removeAttr('style');
                $('.pm_4_5_a:first-child').focus();
            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                $('.pm_4_6_a').removeAttr("disabled");
                $('.pm_4_6_a').parent().parent().removeAttr('style');
                $('.pm_4_6_a:first-child').focus();
            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
        }
    });
    $('#pm_4_4_h').change(function () {
        $('.pm_4_4_i').removeAttr("disabled");
        $('.pm_4_4_i').parent().parent().removeAttr('style');
        $('.pm_4_4_i:first-child').focus();
    });
    $('.pm_4_4_i').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_4_j').removeAttr("disabled");
            $('#pm_4_4_j').parent().parent().removeAttr('style');
            $('#pm_4_4_j').focus();
        } else {
            if ($('.pfp_3_2_a:checked').val() == 1) {
                $('.pm_4_5_a').removeAttr("disabled");
                $('.pm_4_5_a').parent().parent().removeAttr('style');
                $('.pm_4_5_a:first-child').focus();
            } else if ($('.pfp_3_3_a:checked').val() == 1) {
                $('.pm_4_6_a').removeAttr("disabled");
                $('.pm_4_6_a').parent().parent().removeAttr('style');
                $('.pm_4_6_a:first-child').focus();
            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
        }
    });
    $('#pm_4_4_j').change(function () {
        if ($('.pfp_3_2_a:checked').val() == 1) {
            $('.pm_4_5_a').removeAttr("disabled");
            $('.pm_4_5_a').parent().parent().removeAttr('style');
            $('.pm_4_5_a:first-child').focus();
        } else if ($('.pfp_3_3_a:checked').val() == 1) {
            $('.pm_4_6_a').removeAttr("disabled");
            $('.pm_4_6_a').parent().parent().removeAttr('style');
            $('.pm_4_6_a:first-child').focus();
        } else if ($('.pfp_3_4_a:checked').val() == 1) {
            $('.pm_4_7_a').removeAttr("disabled");
            $('.pm_4_7_a').parent().parent().removeAttr('style');
            $('.pm_4_7_a:first-child').focus();
        } else {
            $('.i_5_1_a').removeAttr("disabled");
            $('.i_5_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });


    $('.pm_4_5_a').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_5_b').removeAttr("disabled");
            $('#pm_4_5_b').parent().parent().removeAttr('style');
            $('#pm_4_5_b').focus();
        } else {
            $('.pm_4_5_c').removeAttr("disabled");
            $('.pm_4_5_c').parent().parent().removeAttr('style');
            $('.pm_4_5_c:first-child').focus();
        }
    });
    $('#pm_4_5_b').change(function () {
        $('.pm_4_5_c').removeAttr("disabled");
        $('.pm_4_5_c').parent().parent().removeAttr('style');
        $('.pm_4_5_c:first-child').focus();
    });
    $('.pm_4_5_c').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_5_d').removeAttr("disabled");
            $('#pm_4_5_d').parent().parent().removeAttr('style');
            $('#pm_4_5_d').focus();
        } else {
            $('.pm_4_5_e').removeAttr("disabled");
            $('.pm_4_5_e').parent().parent().removeAttr('style');
            $('.pm_4_5_e:first-child').focus();
        }
    });
    $('#pm_4_5_d').change(function () {
        $('.pm_4_5_e').removeAttr("disabled");
        $('.pm_4_5_e').parent().parent().removeAttr('style');
        $('.pm_4_5_e:first-child').focus();
    });
    $('.pm_4_5_e').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_5_f').removeAttr("disabled");
            $('#pm_4_5_f').parent().parent().removeAttr('style');
            $('#pm_4_5_f').focus();
        } else {
            $('.pm_4_5_g').removeAttr("disabled");
            $('.pm_4_5_g').parent().parent().removeAttr('style');
            $('.pm_4_5_g:first-child').focus();
        }
    });
    $('#pm_4_5_f').change(function () {
        $('.pm_4_5_g').removeAttr("disabled");
        $('.pm_4_5_g').parent().parent().removeAttr('style');
        $('.pm_4_5_g:first-child').focus();
    });
    $('.pm_4_5_g').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_5_h').removeAttr("disabled");
            $('#pm_4_5_h').parent().parent().removeAttr('style');
            $('#pm_4_5_h').focus();
        } else {
            if ($('.pfp_3_3_a:checked').val() == 1) {
                $('.pm_4_6_a').removeAttr("disabled");
                $('.pm_4_6_a').parent().parent().removeAttr('style');
                $('.pm_4_6_a:first-child').focus();
            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
        }
    });
    $('#pm_4_5_h').change(function () {
        $('.pm_4_5_i').removeAttr("disabled");
        $('.pm_4_5_i').parent().parent().removeAttr('style');
        $('.pm_4_5_i:first-child').focus();
    });
    $('.pm_4_5_i').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_5_j').removeAttr("disabled");
            $('#pm_4_5_j').parent().parent().removeAttr('style');
            $('#pm_4_5_j').focus();
        } else {
            if ($('.pfp_3_3_a:checked').val() == 1) {
                $('.pm_4_6_a').removeAttr("disabled");
                $('.pm_4_6_a').parent().parent().removeAttr('style');
                $('.pm_4_6_a:first-child').focus();
            } else if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
        }
    });
    $('#pm_4_5_j').change(function () {
        if ($('.pfp_3_3_a:checked').val() == 1) {
            $('.pm_4_6_a').removeAttr("disabled");
            $('.pm_4_6_a').parent().parent().removeAttr('style');
            $('.pm_4_6_a:first-child').focus();
        } else if ($('.pfp_3_4_a:checked').val() == 1) {
            $('.pm_4_7_a').removeAttr("disabled");
            $('.pm_4_7_a').parent().parent().removeAttr('style');
            $('.pm_4_7_a').focus();
        } else {
            $('.i_5_1_a').removeAttr("disabled");
            $('.i_5_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });


    $('.pm_4_6_a').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_6_b').removeAttr("disabled");
            $('#pm_4_6_b').parent().parent().removeAttr('style');
            $('#pm_4_6_b').focus();
        } else {
            $('.pm_4_6_c').removeAttr("disabled");
            $('.pm_4_6_c').parent().parent().removeAttr('style');
            $('.pm_4_6_c:first-child').focus();
        }
    });
    $('#pm_4_6_b').change(function () {
        $('.pm_4_6_c').removeAttr("disabled");
        $('.pm_4_6_c').parent().parent().removeAttr('style');
        $('.pm_4_6_c:first-child').focus();
    });
    $('.pm_4_6_c').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_6_d').removeAttr("disabled");
            $('#pm_4_6_d').parent().parent().removeAttr('style');
            $('#pm_4_6_d').focus();
        } else {
            $('.pm_4_6_e').removeAttr("disabled");
            $('.pm_4_6_e').parent().parent().removeAttr('style');
            $('.pm_4_6_e:first-child').focus();
        }
    });
    $('#pm_4_6_d').change(function () {
        $('.pm_4_6_e').removeAttr("disabled");
        $('.pm_4_6_e').parent().parent().removeAttr('style');
        $('.pm_4_6_e:first-child').focus();
    });
    $('.pm_4_6_e').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_6_f').removeAttr("disabled");
            $('#pm_4_6_f').parent().parent().removeAttr('style');
            $('#pm_4_6_f').focus();
        } else {
            $('.pm_4_6_g').removeAttr("disabled");
            $('.pm_4_6_g').parent().parent().removeAttr('style');
            $('.pm_4_6_g:first-child').focus();
        }
    });
    $('#pm_4_6_f').change(function () {
        $('.pm_4_6_g').removeAttr("disabled");
        $('.pm_4_6_g').parent().parent().removeAttr('style');
        $('.pm_4_6_g:first-child').focus();
    });
    $('.pm_4_6_g').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_6_h').removeAttr("disabled");
            $('#pm_4_6_h').parent().parent().removeAttr('style');
            $('#pm_4_6_h').focus();
        } else {
            if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
        }
    });
    $('#pm_4_6_h').change(function () {
        $('.pm_4_6_i').removeAttr("disabled");
        $('.pm_4_6_i').parent().parent().removeAttr('style');
        $('.pm_4_6_i:first-child').focus();
    });
    $('.pm_4_6_i').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_6_j').removeAttr("disabled");
            $('#pm_4_6_j').parent().parent().removeAttr('style');
            $('#pm_4_6_j').focus();
        } else {
            if ($('.pfp_3_4_a:checked').val() == 1) {
                $('.pm_4_7_a').removeAttr("disabled");
                $('.pm_4_7_a').parent().parent().removeAttr('style');
                $('.pm_4_7_a:first-child').focus();
            } else {
                $('.i_5_1_a').removeAttr("disabled");
                $('.i_5_1_a').parent().parent().removeAttr('style');
                $('.wizard-next').trigger('click');
            }
        }
    });
    $('#pm_4_6_j').change(function () {
        if ($('.pfp_3_4_a:checked').val() == 1) {
            $('.pm_4_7_a').removeAttr("disabled");
            $('.pm_4_7_a').parent().parent().removeAttr('style');
            $('.pm_4_7_a:first-child').focus();
        } else {
            $('.i_5_1_a').removeAttr("disabled");
            $('.i_5_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });

    $('.pm_4_7_a').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_7_b').removeAttr("disabled");
            $('#pm_4_7_b').parent().parent().removeAttr('style');
            $('#pm_4_7_b').focus();
        } else {
            $('.pm_4_7_c').removeAttr("disabled");
            $('.pm_4_7_c').parent().parent().removeAttr('style');
            $('.pm_4_7_c:first-child').focus();
        }
    });
    $('#pm_4_7_b').change(function () {
        $('.pm_4_7_c').removeAttr("disabled");
        $('.pm_4_7_c').parent().parent().removeAttr('style');
        $('.pm_4_7_c:first-child').focus();
    });
    $('.pm_4_7_c').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_7_d').removeAttr("disabled");
            $('#pm_4_7_d').parent().parent().removeAttr('style');
            $('#pm_4_7_d').focus();
        } else {
            $('.pm_4_7_e').removeAttr("disabled");
            $('.pm_4_7_e').parent().parent().removeAttr('style');
            $('.pm_4_7_e:first-child').focus();
        }
    });
    $('#pm_4_7_d').change(function () {
        $('.pm_4_7_e').removeAttr("disabled");
        $('.pm_4_7_e').parent().parent().removeAttr('style');
        $('.pm_4_7_e:first-child').focus();
    });
    $('.pm_4_7_e').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_7_f').removeAttr("disabled");
            $('#pm_4_7_f').parent().parent().removeAttr('style');
            $('#pm_4_7_f').focus();
        } else {
            $('.pm_4_7_g').removeAttr("disabled");
            $('.pm_4_7_g').parent().parent().removeAttr('style');
            $('.pm_4_7_g:first-child').focus();
        }
    });
    $('#pm_4_7_f').change(function () {
        $('.pm_4_7_g').removeAttr("disabled");
        $('.pm_4_7_g').parent().parent().removeAttr('style');
        $('.pm_4_7_g:first-child').focus();
    });
    $('.pm_4_7_g').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_7_h').removeAttr("disabled");
            $('#pm_4_7_h').parent().parent().removeAttr('style');
            $('#pm_4_7_h').focus();
        } else {
            $('.i_5_1_a').removeAttr("disabled");
            $('.i_5_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });
    $('#pm_4_7_h').change(function () {
        $('.pm_4_7_i').removeAttr("disabled");
        $('.pm_4_7_i').parent().parent().removeAttr('style');
        $('.pm_4_7_i:first-child').focus();
    });
    $('.pm_4_7_i').change(function () {
        if ($(this).val() == 1) {
            $('#pm_4_7_j').removeAttr("disabled");
            $('#pm_4_7_j').parent().parent().removeAttr('style');
            $('#pm_4_7_j').focus();
        } else {
            $('.i_5_1_a').removeAttr("disabled");
            $('.i_5_1_a').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });
    $('#pm_4_7_j').change(function () {
        $('.i_5_1_a').removeAttr("disabled");
        $('.i_5_1_a').parent().parent().removeAttr('style');
        $('.wizard-next').trigger('click');
    });
    $('.i_5_1_a').change(function () {
        if ($(this).val() == 1) {
            $('.i_5_1_b').removeAttr("disabled");
            $('.i_5_1_b').parent().parent().removeAttr('style');
            $('.i_5_1_b:first-child').focus();
        } else {
            $('.i_5_4_a_flag').removeAttr("disabled");
            $('.i_5_4_a_flag').parent().parent().removeAttr('style');
            $('.i_5_4_a_flag:first-child').focus();
        }
    });
    $('.i_5_1_b').change(function () {
        $('.i_5_1_c').removeAttr("disabled");
        $('.i_5_1_c').parent().parent().removeAttr('style');
        $('.i_5_1_c:first-child').focus();
    });
    $('.i_5_1_c').change(function () {
        $('.i_5_1_d').removeAttr("disabled");
        $('.i_5_1_d').parent().parent().removeAttr('style');
        $('.i_5_1_d:first-child').focus();
    });

    $('.i_5_1_d').change(function () {
        $('.i_5_2_a_flag').removeAttr("disabled");
        $('#i_5_2_a_value').removeAttr("disabled");
        $('#i_5_2_a_value').parent().parent().removeAttr('style');
        $('#i_5_2_a_value').focus();
    });


    $('#i_5_2_a_value').change(function () {
        $('.i_5_3_a').removeAttr("disabled");
        $('.i_5_3_a').parent().parent().removeAttr('style');
        $('.i_5_3_a:first-child').focus();
    });
    $('.i_5_2_a_flag').change(function () {
        $('.i_5_3_a').removeAttr("disabled");
        $('.i_5_3_a').parent().parent().removeAttr('style');
        $('.i_5_3_a:first-child').focus();
    });

    $('.i_5_3_a').change(function () {
        $('.i_5_3_b').removeAttr("disabled");
        $('.i_5_3_b').parent().parent().removeAttr('style');
        $('.i_5_3_b:first-child').focus();
    });

    $('.i_5_3_b').change(function () {
        if ($(this).val() == 1) {
            $('#i_5_3_c_flag').removeAttr("disabled");
            $('#i_5_3_c_flag').parent().parent().removeAttr('style');
            $('#i_5_3_c_flag').focus();
        } else {
            $('.i_5_4_a_flag').removeAttr("disabled");
            $('.i_5_4_a_flag').parent().parent().removeAttr('style');
            $('.i_5_4_a_flag:first-child').focus();
        }
    });
    //
    $('#i_5_3_c_flag').change(function () {
        if ($(this).val() == 77) {
            $('#i_5_3_c_value').removeAttr("disabled");
            $('#i_5_3_c_value').focus();
        } else {
            $('.i_5_4_a_flag').removeAttr("disabled");
            $('.i_5_4_a_flag').parent().parent().removeAttr('style');
            $('.i_5_4_a_flag:first-child').focus();
        }
    });
    $('#i_5_3_c_value').change(function () {
        $('.i_5_4_a_flag').removeAttr("disabled");
        $('.i_5_4_a_flag').parent().parent().removeAttr('style');
        $('.i_5_4_a_flag:first-child').focus();
    });
    $('.i_5_4_a_flag').change(function () {
        if ($(this).val() == 1) {

            $('#i_5_4_a_value').removeAttr("disabled");
            $('#i_5_4_a_value').parent().parent().removeAttr('style');
            $('#i_5_4_a_value').focus();

            //  $('.i_5_4_b').removeAttr("disabled");
            // $('.i_5_4_b').parent().parent().removeAttr('style');
            // $('.i_5_4_b:first-child').focus();
        } else {
            $('#i_5_4_a_value').val('');
            $('#i_5_4_a_value').attr("disabled", "disabled");
            $('#d_6_1').removeAttr("disabled");
            $('#d_6_1').parent().parent().removeAttr('style');
            $('.wizard-next').trigger('click');
        }
    });
    $('#i_5_4_a_value').change(function () {
        $('.i_5_4_b').parent().parent().removeAttr('style');
        $('.i_5_4_c').parent().parent().removeAttr('style');
        $('.i_5_4_d').parent().parent().removeAttr('style');
        $('.i_5_5_a_value').parent().parent().removeAttr('style');
        $('.i_5_5_a_flag').parent().parent().removeAttr('style');
        $('.i_5_5_b').parent().parent().removeAttr('style');
        $('.i_5_6_a').parent().parent().removeAttr('style');
        $('.i_5_6_b').parent().parent().removeAttr('style');
        $('.i_5_6_c_value').parent().parent().removeAttr('style');
        $('.i_5_6_c_flag').parent().parent().removeAttr('style');

        if ($('#i_5_4_a_value').val() == 1) {
            $('.i_5_4_b:first-child').removeAttr("disabled");
            $('.i_5_4_c:first-child').removeAttr("disabled");
            $('.i_5_4_d:first-child').removeAttr("disabled");
            $('.i_5_5_a_value:first-child').removeAttr("disabled");
            $('.i_5_5_a_flag_0').removeAttr("disabled");
            $('.i_5_5_b:first-child').removeAttr("disabled");
            $('.i_5_6_a:first-child').removeAttr("disabled");
            $('.i_5_6_b:first-child').removeAttr("disabled");
            // $('.i_5_6_c_value:nth-child(2)').removeAttr("disabled");
            $('.i_5_6_c_flag:first-child').removeAttr("disabled");
        } else if ($('#i_5_4_a_value').val() == 2) {
            $('.i_5_4_b:first-child').removeAttr("disabled");
            $('.i_5_4_c:first-child').removeAttr("disabled");
            $('.i_5_4_d:first-child').removeAttr("disabled");
            $('.i_5_5_a_value:first-child').removeAttr("disabled");
            $('.i_5_5_a_flag_0').removeAttr("disabled");
            $('.i_5_5_b:first-child').removeAttr("disabled");
            $('.i_5_6_a:first-child').removeAttr("disabled");
            $('.i_5_6_b:first-child').removeAttr("disabled");
            //$('.i_5_6_c_value:nth-child(2)').removeAttr("disabled");
            $('.i_5_6_c_flag:first-child').removeAttr("disabled");

            $('.i_5_4_b:nth-child(2)').removeAttr("disabled");
            $('.i_5_4_c:nth-child(2)').removeAttr("disabled");
            $('.i_5_4_d:nth-child(2)').removeAttr("disabled");
            $('.i_5_5_a_value:nth-child(6)').removeAttr("disabled");
            $('.i_5_5_a_flag_1').removeAttr("disabled");
            $('.i_5_5_b:nth-child(2)').removeAttr("disabled");
            $('.i_5_6_a:nth-child(2)').removeAttr("disabled");
            $('.i_5_6_b:nth-child(2)').removeAttr("disabled");
            // $('.i_5_6_c_value:nth-child(4)').removeAttr("disabled");
            $('.i_5_6_c_flag:nth-child(3)').removeAttr("disabled");
        } else if ($('#i_5_4_a_value').val() > 2) {
            $('.i_5_4_b:first-child').removeAttr("disabled");
            $('.i_5_4_c:first-child').removeAttr("disabled");
            $('.i_5_4_d:first-child').removeAttr("disabled");
            $('.i_5_5_a_value:first-child').removeAttr("disabled");
            $('.i_5_5_a_flag_0').removeAttr("disabled");
            $('.i_5_5_b:first-child').removeAttr("disabled");
            $('.i_5_6_a:first-child').removeAttr("disabled");
            $('.i_5_6_b:first-child').removeAttr("disabled");
            // $('.i_5_6_c_value:nth-child(2)').removeAttr("disabled");
            $('.i_5_6_c_flag:first-child').removeAttr("disabled");

            $('.i_5_4_b:nth-child(2)').removeAttr("disabled");
            $('.i_5_4_c:nth-child(2)').removeAttr("disabled");
            $('.i_5_4_d:nth-child(2)').removeAttr("disabled");
            $('.i_5_5_a_value:nth-child(6)').removeAttr("disabled");
            $('.i_5_5_a_flag_1').removeAttr("disabled");
            $('.i_5_5_b:nth-child(2)').removeAttr("disabled");
            $('.i_5_6_a:nth-child(2)').removeAttr("disabled");
            $('.i_5_6_b:nth-child(2)').removeAttr("disabled");
            // $('.i_5_6_c_value:nth-child(4)').removeAttr("disabled");
            $('.i_5_6_c_flag:nth-child(3)').removeAttr("disabled");

            $('.i_5_4_b:nth-child(3)').removeAttr("disabled");
            $('.i_5_4_c:nth-child(3)').removeAttr("disabled");
            $('.i_5_4_d:nth-child(3)').removeAttr("disabled");
            $('.i_5_5_a_value:nth-child(11)').removeAttr("disabled");
            $('.i_5_5_a_flag_2').removeAttr("disabled");
            $('.i_5_5_b:nth-child(3)').removeAttr("disabled");
            $('.i_5_6_a:nth-child(3)').removeAttr("disabled");
            $('.i_5_6_b:nth-child(3)').removeAttr("disabled");
            // $('.i_5_6_c_value:nth-child(6)').removeAttr("disabled");
            $('.i_5_6_c_flag:nth-child(5)').removeAttr("disabled");
        }
    });

    $('.i_5_4_b').change(function () {
        $('.i_5_4_c').parent().parent().removeAttr('style');
        $('.i_5_4_c:first-child').focus();
    });
    $('.i_5_4_c').change(function () {
        $('.i_5_4_d').parent().parent().removeAttr('style');
        $('.i_5_4_d:first-child').focus();
    });
    $('.i_5_4_d').change(function () {
        $('.i_5_5_a_flag').removeAttr("disabled");
        $('#i_5_5_a_value').parent().parent().removeAttr('style');
        $('#i_5_5_a_value').focus();
    });
    $('#i_5_5_a_value').change(function () {
        $('#i_5_5_b').parent().parent().removeAttr('style');
        $('#i_5_5_b').focus();
    });
    $('.i_5_5_a_flag').change(function () {
        $('#i_5_5_b').parent().parent().removeAttr('style');
        $('#i_5_5_b').focus();
    });

    $('#i_5_5_b').change(function () {
        $('.i_5_6_a').parent().parent().removeAttr('style');
        $('.i_5_6_a:first-child').focus();
    });
    $('.i_5_6_a').change(function () {
        if ($(this).val() == 1) {
            $('.i_5_6_b').parent().parent().removeAttr('style');
            $('.i_5_6_b:first-child').focus();
        } else {
            $('#d_6_1').removeAttr("disabled");
            $('#d_6_1').parent().parent().removeAttr('style');
            //$('.wizard-next').trigger('click');
        }
    });
    $('.i_5_6_b').change(function () {
        if ($(this).val() == 1) {
            $('.i_5_6_c_flag').parent().parent().removeAttr('style');
            $('.i_5_6_c_flag:first-child').focus();
        } else {
            $('#d_6_1').removeAttr("disabled");
            $('#d_6_1').parent().parent().removeAttr('style');
            //  $('.wizard-next').trigger('click');
        }
    });
    $('.i_5_6_c_flag').change(function () {
        if ($(this).val() == 77) {
            $(this).next().removeAttr("disabled");
            $(this).next().focus();
        } else {
            $('#d_6_1').removeAttr("disabled");
            $('#d_6_1').parent().parent().removeAttr('style');
            // $('.wizard-next').trigger('click');
        }
    });
    $('.i_5_6_c_value').change(function () {
        $('#d_6_1').removeAttr("disabled");
        $('#d_6_1').parent().parent().removeAttr('style');
        //$('.wizard-next').trigger('click');
    });

    $('#d_6_1').change(function () {
        $('.d_6_2_flag').removeAttr("disabled");
        $('#d_6_2_flag').removeAttr("disabled");
        $('#d_6_2_flag').parent().parent().removeAttr('style');
        $('#d_6_2_flag').focus();
    });
    $('#d_6_2_flag').change(function () {
        if ($('#d_6_2_flag').val() == 77) {
            $('#d_6_2_value').removeAttr("disabled");
        } else {
            $('#d_6_3_flag').removeAttr("disabled");
            $('#d_6_3_flag').parent().parent().removeAttr('style');
            $('#d_6_3_flag').focus();
        }
    });
    $('#d_6_2_value').change(function () {
        $('#d_6_3_flag').removeAttr("disabled");
        $('#d_6_3_flag').parent().parent().removeAttr('style');
        $('#d_6_3_flag').focus();
    });
    $('#d_6_3_flag').change(function () {
        if ($(this).val() == 77) {
            $('#d_6_3_value').removeAttr("disabled");
            $('#d_6_3_value').focus();
        } else {
            $('#d_6_3_value').attr("disabled", "disabled");
            $('.d_6_4').removeAttr("disabled");
            $('.d_6_4').parent().parent().removeAttr('style');
            $('.d_6_4:first-child').focus();
        }
    });
    $('#d_6_3_value').change(function () {
        $('.d_6_4').removeAttr("disabled");
        $('.d_6_4').parent().parent().removeAttr('style');
        $('.d_6_4:first-child').focus();
    });
    $('.d_6_4').change(function () {
        $('.d_6_5_a_flag').removeAttr("disabled");
        $('#d_6_5_a_value').removeAttr("disabled");
        $('#d_6_5_a_value').parent().parent().removeAttr('style');
        $('#d_6_5_a_value').focus();
    });
    $('.d_6_5_a_flag').change(function () {
        $('.d_6_5_b_flag').removeAttr("disabled");
        $('#d_6_5_b_value').removeAttr("disabled");
        $('#d_6_5_b_value').parent().parent().removeAttr('style');
        $('#d_6_5_b_value').focus();
    });
    $('#d_6_5_a_value').change(function () {
        $('.d_6_5_b_flag').removeAttr("disabled");
        $('#d_6_5_b_value').removeAttr("disabled");
        $('#d_6_5_b_value').parent().parent().removeAttr('style');
        $('#d_6_5_b_value').focus();
    });
    $('.d_6_5_b_flag').change(function () {
        $('.d_6_5_c_flag').removeAttr("disabled");
        $('#d_6_5_c_value').removeAttr("disabled");
        $('#d_6_5_c_value').parent().parent().removeAttr('style');
        $('#d_6_5_c_value').focus();
    });
    $('#d_6_5_b_value').change(function () {
        $('.d_6_5_c_flag').removeAttr("disabled");
        $('#d_6_5_c_value').removeAttr("disabled");
        $('#d_6_5_c_value').parent().parent().removeAttr('style');
        $('#d_6_5_c_value').focus();
    });

    $("#call_status").change(function () {
        if ($("#call_status").val() == 0) {
            $("#date").removeAttr("disabled");
            $("#time").removeAttr("disabled");
        } else {
            $("#date").attr('disabled', 'disabled');
            $("#time").attr('disabled', 'disabled');
        }
    });
});