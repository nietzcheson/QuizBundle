<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder,
    Egulias\QuizBundle\Entity\Question
;
use Doctrine\Common\Util\Debug;

class AnswerFormType extends AbstractType
{
    private $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }
    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;
        $builder
            ->add('response', $this->question->getType(), array(
                'required' => TRUE,
                'trim'     => TRUE,
                'label'    => $this->question->getText(),
            )
        );
    }

    public function getName()
    {
        return 'answer';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Egulias\QuizBundle\Entity\Answer'
        );
    }

}
