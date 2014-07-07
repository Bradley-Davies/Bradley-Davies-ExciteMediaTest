
<?php

//For this test I have made several assumptions that I would normally have cleared in interaction with the client.
//I have listed these assumptions where relevant but will list them here for clarification.
//1. I have acted under the assumption that the demo test UI is in use.
//2. I have made assumptions about the data types being passed through, and the relevant values to associate with. (I.e. Size = int. Effects = int with value of 0->F or 1->T)
//3. I have assumed that 'size'/'radius' affect the same aspect of the picture (i.e. the size) and that whicever method of altering the size is selected
//	the UI will pass an integer based on the relative selection. (i.e. A text box value 100 is passed as an int, or a radius slider location equating to a
//	relative value of 100, will result in an int value of 100 being passed) It is assumed that the details are handled at the front end and this framework 
//	recieves only a definitive integer to work with. It is also assumed that the 'size' provided is a single value representing a dimension (length, radius, etc..)
//	and that other dimensions are - if relevant - relatively scaled.
//4. As mentioned in the brief, no actual image manipulation has been implemented.
//5. The image itself is not stored/displayed in this class. This class is simply used to alter and record alterations to the image which is associated to the class.
//6. I have assumed that all effects should only be able to be applied to an image once. This can easily be reversed.
//7. I have assumed that the UI code can be altered minimally in the provision of parameters to define which effects are applied.
//	for example if the 4 current effects(3 + resizing) in the demo UI are changed to 6 effects(5 + resizing) parameters would obviously need to change to
//	incorporate the effects being applied. Other than ensuring parameter stability all effects should be incorporated in this framework.


// NOTE: As mentioned in #6 This framework assumes that effects can only be applied to a picture once. By removing this restriction we can remove the need for the 
//$imgEffects variable array and any comparisons/incrementations of that array, thus making a more efficient program, but one that might be considered buggy
//depending on the clients desires. I chose to hold this restriction as it seems a more viable desire to a client and it would remove the need for OOP as a class
//would be unneccesary.



class Image
{
//	THIS area defines the variables that hold currently relative values before manipulation.

	$imgEffects=array(0,0,0,0); //Creates an array that records the effects currently applied (positions 0,1,2 will = either 0 for false or 1 for true)
				    //and the size (position imgEffects[3] will hold a positive integer = the current size)
				    //to aid in resizing, and prevention of re-applying effects (assumed requirement).
	

	//Originally used this variable for sizing but replaced it with the above array.
	//$imgSize; // Defines the size of the image to aid in re-sizing etc.. (assumes a single measurement for size and relative scaling)


	//Function to handle changes to the image - i.e. change size, colour effects etc..
	//The function is passed an string with the path of the image, and an array with the status of the effects
	//and it handles all manipulation in itself, rather than having multiple functions/large quantities of variables being passed.

	//The array variable holds 4 integer values to achieve the effects required by the example
	//UI provided. The first 3 values will be either 0 or 1 (True/False) which specifies whether an effect is being implemented
	//and the final value will be a positive integer defining the size of the image.
	//In the UI provided utilising a slider OR text box for size, the integer determining size would have to be defined before calling
	//the function.


	function ApplyEffect($targetSrc, $effects=array(0,0,0,0))
	{	//Although targetSrc is not used in this version of the framework, it would be needed to implement the image manipulation. (I.e. the completed work)

		
		//I used multiple if statements rather than a loop here due to different data types/applications on the data post-testing.
		//Check to see if the image has been changed and updates if neccesary.

		if($effects[0] == 1 && $this->imgEffects[0] != 1) //If TRUE that first effect is to be applied and has not already been applied.
		{
			//I.E. if effects box 1 ($effects[0]) is ticked this will run.
			//Add image manipulation here. As it was specified in the requirements that the actual image manipulation was not 
			//neccessary - only the framework - I have not included it here.

			$this->imgEffects[0] = 1; // Prevents this effect being re-applied.
		}
		if($effects[1] == 1 && $this->imgEffects[1] != 1) //If TRUE that second effect is to be applied and has not already been applied.
		{
			//Add image manipulation here.

			$this->imgEffects[1] = 1; // Prevents this effect being re-applied.
		}
		if($effects[2] == 1 && $this->imgEffects[2] != 1) //If TRUE that third effect is to be applied and has not already been applied.
		{			
			//Add image manipulation here.

			$this->imgEffects[2] = 1; // Prevents this effect being re-applied.
		}
		if($effects[3] != $this->imgEffects[3]) //If desired size is different to the current size.
		{
			//Add image manipulation here.

			$this->imgEffects[3] = $effects[3]; // Sets the recorded size to the current size.
		}
			//etc.. Continue for all possible effects that might have been applied. I have only created 4 options as per the demo UI.
	
		
	}
}


/*

I have achieved the requirements of the project as follows.

• Allow handling of multiple images at once, each one with its desired effects:

I have utilised a class system which allows unlimited amounts of pictures being recorded. e.g. Class Image Photo1..->.. Class Image Photo500 
can all have different pictures and effects simultaniously since they are all recorded sperately in their own class.

• Allow an easy system of adding/removing plugins (by plugin we assume a specific image
operation, like Adobe Photoshop effects and filters) without touching the code of the rest of the
application. You can either use a "config.php" file containing only associative arrays, or rely on
some other method of managing the plugins configuration.

As long as the parameters are passed correctly (there was no definitive indication of what parameters were passed so I acted on assumptions) 
then all editing should occur inside this framework.
Note that this does not include displaying the picture since it is assumed that is handled externally to this framework.

• Allow multiple effects for each of the photos

Multiple effects can be applied and are handled by the IF statements in the ApplyEffect function. All effects desired will be applied in one 
implementation of the code.

• You are not supposed to implement any UI, another engineer will be doing that. Now, the APIs
you provide will be used to build a UI like the one below, which is provided as a guidance.


I have utilised but not implemented the demo UI.

*/



//Usage: The UI would be required to create a variable of 'class Image' (e.g. class Image DEMO) for each picture. (assuming #6 or only a single class otherwise)
//	 The UI would then need to call the function ApplyEffect too apply effects as specified by the user.
//	 E.G. In the demo UI if the user selected an image 'IMG.jpeg' and wanted to apply effect 2 (of 3), and resize to 175 the UI would have to call.
	 
//	 $DEMO = new Image; $DEMO->ApplyEffect("IMG.jpeg", Array{0,1,0,175});

//	How the images are stored is up to the front end. (E.G. as an array of class Image, or as an associative array with a key = filename etc..)

?>




