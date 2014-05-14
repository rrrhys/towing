<?php

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class JobPresenter extends Presenter {
	public function timeRemaining(){

		if($this->finishes_at < Carbon::now()){
			return "Finished";
		}
		$diff = $this->finishes_at->diff(Carbon::now());

		$outString = "";
		if($diff->d > 0){
			$outString .= "{$diff->d}d {$diff->h}h";
		}
		else
		{
			$outString .= "{$diff->h}h {$diff->i}m";
		}
		$outString .= "(" . $this->finishes_at->addHours(10)->format('l g.ia'). ")";
		return $outString;
	}
}