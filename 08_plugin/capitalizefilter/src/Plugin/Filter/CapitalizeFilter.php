<?php
/**
 * Created by PhpStorm.
 * User: asarkar
 * Date: 18/2/18
 * Time: 12:46 PM
 */

namespace Drupal\capitalizefilter\Plugin\Filter;


use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * @Filter(
 *   id = "capitalizefilter",
 *   title = @Translation("Capitalize Filter"),
 *   description = @Translation("Help this text format to Capitalize!"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */

class CapitalizeFilter extends FilterBase
{
    public function process($text, $langcode)
    {

        $text_to_capitalize = explode(',',$this->settings['text_transform']);

        $text_after_capitalize =null;

        foreach ($text_to_capitalize as $text_fragment){
            $text_after_capitalize []= strtoupper($text_fragment);
        }

        $new_text = str_replace($text_to_capitalize,$text_after_capitalize,$text);

        // TODO: Implement process() method.
        return new FilterProcessResult($new_text);
    }

    public function settingsForm(array $form, FormStateInterface $form_state)
    {
        $form['text_transform'] = array(
            '#type' => 'textfield',
            '#title' => $this->t("Capitalize Text"),
            '#size' => 60,
            '#default_value' => $this->settings['text_transform'],
        );

        return $form;
        //return parent::settingsForm($form, $form_state); // TODO: Change the autogenerated stub
    }
}