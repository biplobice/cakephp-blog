	<p>
	    <?php
	       echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
           ));
	    ?>
	</p>
	<ul class="pagination">
	    <?php
	       echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
           echo $this->Paginator->numbers(array('seperator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1));
           echo $this->Paginator->next(__('next'), array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
	    ?>
	</ul>