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
{block name='title'} Dashboard {/block}


{* Unused Section *}
{block name='panel-1'}{/block}


{* Header Panel *}
{block name='panel-2'}
  <a href="{route to='dash_upload_files'}" class="btn btn-dark float-right"><i class="fad fa-user-circle"></i> My Profile</a>
{/block}


{*  Page Body  *}
{block name='body'}

<div hx-get="{route to='dashboard_stats'}"
    hx-trigger='load'
    hx-swap='#main'
    hx-indicator='#preloader'
></div>

<div id='main'>
    <div class="px-4 py-1 pt-5 my-3 text-center">
        <p class='htmx-indicator' id='preloader'><i class='fa fa-spinner fa-spin'></i> Please Wait, Loading.....</p>
    </div>
</div>


{/block}