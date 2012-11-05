{assign var="sidebarPosition" value='left'}
{include file='header.tpl' menu='people'}

{include file='actions/ActionProfile/profile_top.tpl'}
{include file='menu.profile_created.tpl'}

{assign var=sTempPath value="`$sStickyTemplatePath`list_edit.tpl"}
{include file=$sTempPath}

{include file='footer.tpl'}
