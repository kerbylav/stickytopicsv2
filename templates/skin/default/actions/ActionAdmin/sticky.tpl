{assign var="noSidebar" value=true}
{include file='header.tpl'}

<h2 class='page-header'>{$aLang.plugin.stickytopics.edit_index_sticky}</h2>
{assign var=sTempPath value="`$sStickyTemplatePath`list_edit.tpl"}
{include file=$sTempPath}

{include file='footer.tpl'}
