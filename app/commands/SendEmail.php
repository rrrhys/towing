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
			
        switch($data['email']){
        	case("emails.YouWonAJob"):
        		$poster = User::find($data['poster_id']);
        		$emailBodyData = array(
					'poster' => $poster,
					'posterDetails'=>$poster->user_details()->get()->first(),
					'recipient' => User::find($data['recipient_id']),
					'job' => Job::find($data['job_id']),
					'subject' => "You won a job!"
        			);
        	break;
        	case("emails.YourJobFinishedWithBids"):
        		$job = Job::find($data['job_id']);
        		$jobLink = URL::route('job', array($job->id));
        		$winner = $job->lowest_bid->owner;
        		$recipient =  User::find($data['recipient_id']);
        		$emailBodyData = array(
					'recipient' =>$recipient,
					'recipientDetails'=>$recipient->user_details()->get()->first(),
					'job' => $job,
					'jobLink' => $jobLink,
					'winner' => $winner,
					'lowest_bid'=> $job->lowest_bid,
					'subject' => "Your job finished with bids - Please approve."
        			);
        		

        	break;
        	case("emails.YourJobFinishedWithNoBids"):
        		$job = Job::find($data['job_id']);
        		$jobLink = URL::route('job', array($job->id));
        		$recipient =  User::find($data['recipient_id']);
        		$emailBodyData = array(
					'recipient' =>$recipient,
					'recipientDetails'=>$recipient->user_details()->get()->first(),
					'job' => $job,
					'jobLink' => $jobLink,
					'subject' => "Your job finished with NO bids - relist?"
        			);
        	break;
        }
Log::info("emailing " . $emailBodyData['recipient']->email . " " . $data['email']);
        		Mail::send($data['email'], $emailBodyData, function($message) use ($emailBodyData)
				{
				    $message->to(
				    	$emailBodyData['recipient']->email, 
				    	$emailBodyData['recipient']->name
				    	)->subject($emailBodyData['subject']);
				});
    }

}