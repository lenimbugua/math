<div class="form-group row">
	       {{Form::label('papertype', 'Type of Paper', ['class'=>'col-sm-2 col-form-label'])}} 
		   <div class="col-sm-10">
		    	{{Form::select(
		    		'papertype',		    		
		    		['Accounting Problem'=>'Accounting Problem',
                     'Mathematical Problem'=>'Mathematical problem',
                     'Statistics Problem' =>'Statistics Problem',
                     'Technical Paper'=>'Technical Paper',
		    		 'Admission Essay' => 'Admission Essay',
		    		 'Annotated Bibliography'=>'Annotated Bibliography',
		    		 'Application Letter'=>'Application Letter',
		    		 'Argumentative Essay'=>'Argumentative Essay',
		    		 'Article'=>'Article',
		    		 'Article review'=>'Article review',
		    		 'Biography'=>'Biography',
		    		 'Business Plan'=>'Business Plan',
		    		 'Case Study'=>'Case Study',
		    		 'Course Work'=>'Course Work',
		    		 'Cover Letter'=>'Cover Letter',
		    		 'Creative Writing'=>'Creative Writing',
		    		 'Critical Thinking'=>'Critical Thinking',
		    		 'Curriculum Vitae'=>'Curriculum Vitae',
		    		 'Dissertation'=>'Dissertation',
		    		 'Dissertation Proposal'=>'Dissertation Proposal',
		    		 'Dissertation Abstract'=>'Dissertation Abstract',
		    		 'Dissertation Introduction'=>'Dissertation Introduction',
		    		 'Dissertation Hypothesis'=>'Dissertation Hypothesis',
		    		 'Dissertation Chapter'=>'Dissertation Chapter',
		    		 'Dissertation Methodology'=>'Dissertation Methodology',
		    		 'Dissertation Results'=>'Dissertation Results',
		    		 'Dissertation Conclusion'=>'Dissertation Conclusion',
		    		 'Essay'=>'Essay',
		    		 'Literature Review'=>'Literature Review',
		    		 'Movie Review'=>'Movie Review',
		    		 'Personal Statement'=>'Personal Statement',
		    		 'Presentation'=>'Presentation',
		    		 'Problem Solving'=>'Problem Solving',
		    		 'Recommendation Letter'=>'Recommendation Letter',
		    		 'Report'=>'Report',
		    		 'Research Proposal'=>'Research Proposal',
		    		 'Research Paper'=>'Research Paper',
		    		 'Resume'=>'Resume',
		    		 'Speech'=>'Speech',
		    		 'Term Paper'=>'Term Paper',
		    		 'Thesis'=>'Thesis',
		    		 'Thesis Proposal'=>'Thesis Proposal',
		    		 'Thesis Statement'=>'Thesis Statement'
		    		 		    		    		 		    		 
		    		], 
		    		 $orders->paper_type,
		    		 ['class'=>'form-control','onchange'=>'paperType()']
		    	)}}	      		
		    </div>
		</div>	
       
        