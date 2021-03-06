(function(){

  tinymce.PluginManager.requireLangPack('simple_days_alert_plugin', 'ja');
  tinymce.create('tinymce.plugins.SimpleDaysAlertBox', {
    init: function(ed, url){

      ed.addButton('simpledaysalertlist', {
        title: 'Simple Days Alert Box',
        text: 'Alert BOX',
        type: 'listbox',
        values: [
          {text: 'info', value: 'info', style:'background:#dceaea' },
          {text: 'Success', value: 'success', style:'background:#bed8be'},
          {text: 'Warning', value: 'warning', style: 'background:#f9e4a5'},
          {text: 'Danger', value: 'danger', style: 'background:#efa882'},
          {value: 'none',style: 'display:none'}
        ],
        value:'none',
        onselect:  function(e) {
          var selectedText = ed.selection.getContent({format: 'html'});
          var word = '<div class="alert_box_s_d ' + this.value() + '_s_d simple_days_box_shadow">'+ selectedText +'</div>';
          tinyMCE.execCommand('mceInsertContent',false,word);
                //editor.insertContent(this.value());

        },



      });

    },
    getInfo: function() {
      return {
        longname : 'Simple Days Alert BOX',
        author : 'YAHMAN',
        authorurl : 'https://back2nature.jp',
        version : "0.0.1"
      };
    }
  });
  tinymce.PluginManager.add( 'simple_days_alert_plugin', tinymce.plugins.SimpleDaysAlertBox );
})();