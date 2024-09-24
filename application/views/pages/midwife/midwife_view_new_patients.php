<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <form id="indexForm">

                <!-- Index Encoder -->
                <div class="d-flex justify-content-center">
                    <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                    <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Index Form</small> <br> <small class="fs-3">( <span class="fs-3" id="currentYear"></span> - Present )</small> </h5>
                    <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                </div>
                <hr class="border-5 mb-4">

                <div class="row">
                    <input type="hidden" name="rid" id="rid">
                    <div class="col-md-8">
                        <label for="cname" class="">Name</label>
                        <input list="residentsList" type="text" class="form-control shadow-none" id="cname" placeholder="Type name here..." autocomplete="off" value="<?= $preg[0]->firstname ?> <?= $preg[0]->middlename ?> <?= $preg[0]->lastname ?>" readonly>
                        <datalist id="residentsList">
                            <!-- Resident options will be populated here -->
                        </datalist>
                    </div>

                    <div class="col-md-4">
                        <label for="spe" class="">Send To</label>
                        <select class="form-select shadow-none" name="spe" id="spe">
                            <option value="<?= $user_info[0]->firstname ?> <?= $user_info[0]->middlename ?> <?= $user_info[0]->lastname ?>"><?= $user_info[0]->firstname ?> <?= $user_info[0]->middlename ?> <?= $user_info[0]->lastname ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <label for="address" class="">Address</label>
                    <input type="text" class="form-control shadow-none" id="address" placeholder="Address" value="<?= $preg[0]->street ?> <?= $preg[0]->fname ?> <?= $preg[0]->city ?>" readonly>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="dateOfBirth" class="">Birthday</label>
                        <input type="date" class="form-control shadow-none" id="dateOfBirth" value="<?= $preg[0]->birthdate ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="age" class="">Age</label>
                        <input type="number" class="form-control shadow-none" id="age" placeholder="Age" value="<?= $preg[0]->age ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="contactNo" class="">Contact Number</label>
                        <input type="number" class="form-control shadow-none" id="contactNo" placeholder="Contact No." value="<?= $preg[0]->mobileno ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="cstatus" class="">Civil Status</label>
                        <input type="text" class="form-control shadow-none" id="cstatus" placeholder="Civil Status" value="<?= $preg[0]->civilStatus ?>" readonly>
                    </div>

                    <div class="col-md-3 mt-3">
                        <label for="wt" class="">Weight</label>
                        <div class="input-group">
                            <input type="number" class="form-control shadow-none" name="wt" id="wt" placeholder="kg." value="<?= $preg[0]->weight ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <label for="ht" class="">Height</label>
                        <div class="input-group">
                            <input type="number" class="form-control shadow-none" name="ht" id="ht" placeholder="cm." value="<?= $preg[0]->height ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <label for="temp" class="">Temperature.</label>
                        <div class="input-group">
                            <input type="text" class="form-control shadow-none" name="temp" id="temp" value="<?= $preg[0]->temp ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <label for="bp" class="">BP</label>
                        <div class="input-group">
                            <input type="text" class="form-control shadow-none" name="bp" id="bp" value="<?= $preg[0]->bp ?>" readonly>
                        </div>
                    </div>

                    <hr class="border-5 mb-4 mt-4">

                </div>
            </form>

            <div class="d-flex justify-content-end">
                <button type="button" onclick="generatePdf()" class="btn btn-danger me-2"> <i class="ti ti-download"></i> PDF</button>
                <button type="button" onclick="printPdf()" class="btn btn-warning"> <i class="ti ti-printer"></i> Print</button>
            </div>

        </div>
    </div>
</div>

<script>
    window.jsPDF = window.jspdf.jsPDF;

    function printPdf() {
        let jsPdf = new jsPDF('l', 'pt', 'A4');
        var htmlElement = document.getElementById('indexForm');

        html2canvas(htmlElement, {
            allowTaint: true,
            scale: 1,
            scrollY: -window.scrollY,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var imgWidth = jsPdf.internal.pageSize.getWidth() - 65;
            var imgHeight = canvas.height * imgWidth / canvas.width;

            jsPdf.addImage(imgData, 'PNG', 30, 30, imgWidth, imgHeight);

            jsPdf.autoPrint(); // Automatically prints the PDF
            window.open(jsPdf.output('bloburl'), '_blank');
        });
    }
</script>


<script>
    window.jsPDF = window.jspdf.jsPDF;

    function generatePdf() {
        let jsPdf = new jsPDF('l', 'pt', 'A4');
        var htmlElement = document.getElementById('indexForm');

        html2canvas(htmlElement, {
            allowTaint: true,
            scale: 1,
            scrollY: -window.scrollY,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var imgWidth = jsPdf.internal.pageSize.getWidth() - 65;
            var imgHeight = canvas.height * imgWidth / canvas.width;

            jsPdf.addImage(imgData, 'PNG', 30, 30, imgWidth, imgHeight);
            jsPdf.save("Index_from.pdf");
            window.open(jsPdf.output('bloburl'));
        });
    }
</script>