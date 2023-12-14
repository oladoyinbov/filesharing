{extends file="layouts/dashboard.tpl"}


{* Custom Styles *}
{block name='style'}
   <style>
    a {
        text-decoration: none;
    }

    .sxa{
        transition: all 2s ease-in;
    }
    </style>
{/block}

{*  Page Title  *}
{block name='title'} Upload Files {/block}


{*  Page Body  *}
{block name='body'}

<div class="m-4 mt-5" id="message">
    <center>
        <div class="border border-primary-subtle shadow shadow shadow-dark shadow-lg rounded px-4 py-1 pt-5 pb-5 my-3 m-5 text-center">

            <form id='form' hx-encoding='multipart/form-data' hx-post='' hx-trigger='change' hx-target='#message'>
                <label for="mfl"><i class="fad fa-cloud-upload-alt fa-5x"></i></label>
                <input type='file' name='hc_file[]' id='mfl' multiple><br>
                <h5>Choose Your File to Upload</h5>

                <div id="loading">
                    <progress id="progress" value="0" max="100" style="width:60vw;height:90px;margin-bottom:20px;"><br>
                <h4 class='text-center'><i>Uploading.....</i></h4>
                </div>

                <br>
            </form>

        </div>
    </center>
</div>

<script>
htmx.on('#form', 'htmx:xhr:progress', function(evt) {
  htmx.find('#progress').setAttribute('value', evt.detail.loaded/evt.detail.total * 100)
});

$(document).ready(function(){
    var progress_bar = $('#loading');
    var input = $('#mfl');
    // hide progress bar 
    progress_bar.hide();
    input.hide();

    $('#form').on('change', function(e){
        progress_bar.show();
    });
});

</script>
{/block}