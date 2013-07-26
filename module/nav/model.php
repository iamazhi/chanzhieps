<?php
/**
 * The model file of article category of xirangEPS.
 *
 * @copyright   Copyright 2013-2013 QingDao XiRang Network Infomation Co,LTD (www.xirang.biz)
 * @author      Xiying Guan
 * @package     xirangEPS
 * @version     $Id$
 * @link        http://www.xirang.biz
 */
class navModel extends model
{
    /**
     * create form input tags of backend.
     *
     * @param int $grade
     * @param array $nav
     *
     */
    public function createEntry($grade = 1, $nav = array())
    {
        $class         = "";
        $disabled      = '';
        $childGrade    = $grade+1;
        $articleTree   = $this->loadModel('tree')->getOptionMenu('article');
        $html .= '<i class="icon-folder-open shut"></i>';

        $type  = isset($nav['type']) ? $nav['type'] : ''; 
        $html .= html::select("nav[{$grade}][type][]", $this->lang->nav->types, $type, "class='navType' grade='{$grade}'" );

        $hideArticle = $hideCommon = 'hide';
        if(isset($nav['type']) && $nav['type'] == 'article')
        {
            $hideArticle = "";
        }
        elseif($nav['type'] == 'common')
        {
            $hideCommon = "";
        }
        $html .= html::select("nav[{$grade}][article][]", $articleTree, $nav['article'], "class='navSelector {$hideArticle}'");
        $html .= html::select("nav[{$grade}][common][]", $this->lang->nav->common, $nav['common'], "class='navSelector {$hideCommon}'");

        $title = isset($nav['title']) ? $nav['title'] : "";
        $html .= html::input("nav[{$grade}][title][]", $title, "placeholder='{$this->lang->inputTitle}' class='input-small titleInput'");

        if(isset($nav['type']) && $nav['type'] != 'input')
        {
            $class    = "hide"; 
            $disabled = 'disabled';
        }
        $url   = isset($nav['url']) ? $nav['url'] : "";
        $html .= html::input("nav[{$grade}][url][]", $url, "placeholder='{$this->lang->inputUrl}' class='urlInput {$class}' {$disabled}");

        $html .= html::a('javascript:;', $this->lang->add, '', "class='plus{$grade}'" );
        if($childGrade < 4) $html .= html::a('javascript:;', $this->lang->addChild, '', "class='plus{$childGrade}'" );
        $html .= html::a('javascript:;', $this->lang->delete, '', 'class="remove red"' );
        $html .= '<i class="icon-arrow-up"></i> <i class="icon-arrow-down"></i>';
        if($grade >1 ) $html .= html::hidden("nav[{$grade}][parent][]", '', "class='grade{$grade}parent'" );
        $html .= html::hidden("nav[{$grade}][key][]", '', "class='input grade{$grade}key'"); 
        return $html;
    }

    /**
     * organize split navs to required structure.
     *
     * @param  array $navs         posted original nav .
     * @return array $organizeNavs   
     */
    public function organizeNav($navs)
    {
        $navCount = count($navs['title']); // get count by common item title.
        $organizedNavs = array();

        for($i = 0; $i < $navCount; $i++)
        {
            foreach($navs as $field => $values) $organizeNavs[$i][$field] = $values[$i];
        }
        return $organizeNavs;
    }

    /**
     * group nav children by parent.
     *
     * @param  array $navs
     * @return array $navs
     */   
    public function group($navs)
    {
        $groupedNavs = array();
        foreach($navs as $nav)
        {
            if(!isset($groupedNavs[$nav['parent']])) $newData[$nav['parent']] = array();
            $groupedNavs[$nav['parent']][] = $nav;
        }
        return $groupedNavs;
    }
}