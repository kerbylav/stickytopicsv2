<?php
/*-------------------------------------------------------
*
*   StickyTopics v2.
*   Copyright © 2012 Alexei Lukin
*
*--------------------------------------------------------
*
*   Official site: imthinker.ru/stickytopics2
*   Contact e-mail: kerbylav@gmail.com
*
---------------------------------------------------------
*/

class PluginStickytopics_HookStickytopics extends Hook
{

    public function RegisterHook()
    {
        $oUserCurrent=$this->User_GetUserCurrent();
        if (!$oUserCurrent)
            return;
        
        $this->AddHook('template_menu_blog_edit_admin_item', 'AddBlogEditMenu');
        $this->AddHook('template_menu_profile_created_item', 'AddPersonalEditMenu');
        $this->AddHook('template_admin_action_item', 'AddAdminEditMenu');
    }

    public function AddBlogEditMenu($aParams)
    {
        $res=$this->Viewer_Fetch($this->PluginStickytopics_Stickytopics_GetTemplateFilePath(__CLASS__, 'blog_edit_menu.tpl'));
        return $res;
    }

    public function AddPersonalEditMenu($aParams)
    {
        if (!$oUserCurrent=$this->User_GetUserCurrent())
            return;
        
        if ($aParams['oUserProfile']->getId() != $oUserCurrent->getId())
            return;
        
        if (!$this->ACL_CanStickTopic($aParams['oUserProfile'], 'personal'))
            return;
        
        $res=$this->Viewer_Fetch($this->PluginStickytopics_Stickytopics_GetTemplateFilePath(__CLASS__, 'personal_edit_menu.tpl'));
        return $res;
    }

    public function AddAdminEditMenu($aParams)
    {
        $res=$this->Viewer_Fetch($this->PluginStickytopics_Stickytopics_GetTemplateFilePath(__CLASS__, 'admin_edit_menu.tpl'));
        return $res;
    }

}
?>
