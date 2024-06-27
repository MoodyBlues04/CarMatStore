<div  id="modal__project-error" class="modal-error" data-modal="one">
    <div class="modal-content-error">
        <img src="{{ asset('img/add-square.svg') }}" alt="" class="close-error">
        <div class="modal-content-red">
            <h3>Error</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet justo ipsum. Sed accumsan quam vitae est varius fringilla. Pellentesque placerat vestibulum lorem sed porta. Nullam mattis tristique iaculis. Nullam pulvinar sit amet risus pretium auctor. Etiam quis massa pulvinar, aliquam quam vitae, tempus sem.
            </p>
        </div>
        <div class="modal-content-white">
            <button type="button" class="btn-repeat-gray">Повторить</button>
            <button type="button" class="btn-close-red">Закрыть</button>
        </div>
    </div>
    <script>
        let modal = document.getElementById("modal__project-error");
        // Get the button that opens the modal
        let btn = document.getElementsByClassName("openModal-error");
        console.log('test')
        // Get the <span> element that closes the modal
        let span = document.getElementsByClassName("close-error")[0];
        let closeBtn = document.getElementsByClassName("btn-close-red")[0];
        // When the user clicks the button, open the modal
        for(let i = 0;i < btn.length; i++)
        {
            let v = btn[i]
            v.onclick = function() {
                modal.style.display = "flex";
            }
        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</div>
