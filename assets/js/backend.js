/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2016, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

window.Backend=window.Backend||{};(function(exports){'use strict';$(document).ready(function(){window.console=window.console||function(){};$(window).on('resize',function(){Backend.placeFooterToBottom()}).trigger('resize');$(document).ajaxStart(function(){$('#loading').show()});$(document).ajaxStop(function(){$('#loading').hide()});$('.menu-item').qtip({position:{my:'top center',at:'bottom center'},style:{classes:'qtip-green qtip-shadow custom-qtip'}});GeneralFunctions.enableLanguageSelection($('#select-language'))});exports.DB_SLUG_ADMIN='admin';exports.DB_SLUG_PROVIDER='provider';exports.DB_SLUG_SECRETARY='secretary';exports.DB_SLUG_CUSTOMER='customer';exports.PRIV_VIEW=1;exports.PRIV_ADD=2;exports.PRIV_EDIT=4;exports.PRIV_DELETE=8;exports.PRIV_APPOINTMENTS='appointments';exports.PRIV_CUSTOMERS='customers';exports.PRIV_SERVICES='services';exports.PRIV_USERS='users';exports.PRIV_SYSTEM_SETTINGS='system_settings';exports.PRIV_USER_SETTINGS='user_settings';exports.placeFooterToBottom=function(){var $footer=$('#footer');if(window.innerHeight>$('body').height()){$footer.css({'position':'absolute','width':'100%','bottom':'0px'})}else{$footer.css({'position':'static'})}};exports.displayNotification=function(message,actions){message=message||'NO MESSAGE PROVIDED FOR THIS NOTIFICATION';if(actions===undefined){actions=[];setTimeout(function(){$('#notification').slideUp('slow')},7000)}
    var customActionsHtml='';$.each(actions,function(index,action){var actionId=action.label.toLowerCase().replace(' ','-');customActionsHtml+='<button id="'+actionId+'" class="btn btn-default btn-xs">'+action.label+'</button>';$(document).off('click','#'+actionId);$(document).on('click','#'+actionId,action['function'])});var notificationHtml='<div class="notification alert">'+'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+'<span aria-hidden="true">&times;</span>'+'</button>'+'<strong>'+message+'</strong>'+customActionsHtml+'</div>';$('#notification').html(notificationHtml);$('#notification').show('blind')}})(window.Backend)
   