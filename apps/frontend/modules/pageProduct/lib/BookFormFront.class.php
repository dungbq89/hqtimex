<?php

/**
 * Book form.
 *
 * @package    form
 * @subpackage book
 * @version    SVN: $Id: BookForm.class.php 6884 2008-01-02 10:32:24Z dwhittle $
 */
class BookingFormFront extends BaseBookingForm
{
    public function configure()
    {
        parent::setup();
        $this->setWidgets(array(
            'full_name' => new sfWidgetFormInputText(),
            'phone' => new sfWidgetFormInputText(),
            'email' => new sfWidgetFormInputText(),
            'body' => new sfWidgetFormTextarea(),
            'lang' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'full_name' => new sfValidatorString(array('max_length' => 255)),
            'phone' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'email' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'body' => new sfValidatorString(array('required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 10)),
        ));
        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
        $this->widgetSchema->setNameFormat('booking[%s]');

    }
}
