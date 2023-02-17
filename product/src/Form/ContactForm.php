<?php
// in src/Form/ContactForm.php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->minLength('name', 10)
            ->email('email');

        return $validator;
    }

    protected function _execute(array $data): bool
    {
        // Send an email.
        $mailer = new Mailer('default');
        $mailer->setTransport('gmail');
        $mailer->setFrom(['manishsingh19970@gmail.com' => 'myCake4'])
        ->setTo('manishsingh19970@gmail.com')
        ->setEmailFormat('html')
        ->setSubject('Query')
        ->deliver(implode('<br>',$data));
        return true;
    }
}
?>