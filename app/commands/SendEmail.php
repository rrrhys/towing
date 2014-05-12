<?php

class SendEmail {


/* Pushing an email:

		$data = array();

		Queue::push('SendEmail',array(
			'to_address'=>'rrrhys@gmail.com',
			'to_name'=>'John Smith',
			'subject'=>'Welcome!',
			'email'=>'emails.welcome'));

*/
    public function fire($job, $data)
    {
        //
        Log::info("Firing email " . $data['email'] . " to " . $data['to_address']);
        Mail::send($data['email'], $data['email_fields'], function($message) use ($data)
		{
		    $message->to($data['to_address'], $data['to_name'])->subject($data['subject']);
		});
    }

}