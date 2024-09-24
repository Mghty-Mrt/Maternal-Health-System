        <textarea class="form-control border-secondary"  name="msg" id="msg" cols="40" rows="10">
          <?php foreach($lmsg as $m) { ?>  
          <?= $m->message ?>
          <?php } ?>
        </textarea>
