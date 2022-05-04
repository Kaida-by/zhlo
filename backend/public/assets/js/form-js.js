let files_list;
let dt1 = new DataTransfer();
let customDNDUploadFile = document.getElementById(
    'form-field-files'
);

let customDNDUploadFiles = [];

customDNDUploadFile.addEventListener('input', (e) => {
    let files = e.target.files;
    if (checkFilesSize(files) === false && checkFilesType(files) === false && checkFilesCount(files) === false) {
        for (let c = 0; c < files.length; c++) {
            dt1.items.add(files[c]);
            preview(files[c]);
        }

        files_list = dt1.files;
        jQuery('#form-field-files').prop('files',files_list)
    } else {
        document.getElementById('form-field-files').value = '';
        jQuery('#form-field-files').prop('files',files_list)
    }
});


let dropboxForm;
dropboxForm = document.querySelector(".form-upload-images-label");
dropboxForm.addEventListener("dragenter", dragenter, false);
dropboxForm.addEventListener("dragover", dragover, false);
dropboxForm.addEventListener("drop", drop, false);

function dragenter(e) {
    e.stopPropagation();
    e.preventDefault();
}
function dragover(e) {
    e.stopPropagation();
    e.preventDefault();
}
function drop(e) {
    e.stopPropagation();
    e.preventDefault();

    var dt = e.dataTransfer;
    var files = dt.files;

    if (checkFilesSize(files) === false && checkFilesType(files) === false && checkFilesCount(files) === false) {
        for (let z = 0; z < files.length; z++) {
            dt1.items.add(files[z]);
            preview(files[z]);
        }

        files_list = dt1.files;
        jQuery('#form-field-files').prop('files', files_list)
    } else {
        document.getElementById('form-field-files').value = '';
        jQuery('#form-field-files').prop('files', files_list)
    }
}

// validate ////////////////////////////////////////////////////////////////////////////////////////////////////////////

function checkFilesCount (files) {
    let filesArray = [];

    for (let idx = 0; idx < files.length; idx++) {
        filesArray.push(files[idx]);
    }

    const filesCount = files.length;

    if (!files_list) {
        if (filesCount <= 10) {
            return false;
        } else {
            let ierr213 = setInterval(function() {
                if (document.querySelector(".errors-blo")){
                    clearInterval(ierr213);
                } else {
                    let elemErrors213 = document.createElement('div');
                    let closeErrors213 = document.createElement('span');

                    errorDivBlock.appendChild(elemErrors213);

                    elemErrors213.classList.add('errors-blo');

                    let myError21 = document.querySelector(".errors-blo");

                    myError21.innerText = 'You can upload up to 10 files.';

                    myError21.appendChild(closeErrors213);
                    closeErrors213.classList.add('errors-close');
                    closeErrors213.onclick = function() {
                        errorDivBlock.removeChild(elemErrors213);
                    }
                    clearInterval(ierr213);
                }
            }, 100);
        }
    } else {
        if (files_list.length > 9) {
            let ierr2131 = setInterval(function() {
                if (document.querySelector(".errors-blo")){
                    clearInterval(ierr2131);
                } else {
                    let elemErrors2131 = document.createElement('div');
                    let closeErrors2131 = document.createElement('span');

                    errorDivBlock.appendChild(elemErrors2131);

                    elemErrors2131.classList.add('errors-blo');

                    let myError21 = document.querySelector(".errors-blo");

                    myError21.innerText = 'You can upload up to 10 files.';

                    myError21.appendChild(closeErrors2131);
                    closeErrors2131.classList.add('errors-close');
                    closeErrors2131.onclick = function() {
                        errorDivBlock.removeChild(elemErrors2131);
                    }
                    clearInterval(ierr2131);
                }
            }, 100);
        } else {
            return false;
        }
    }
}
function checkFilesType (files) {
    let filesArray2 = [];

    for (let idx92 = 0; idx92 < files.length; idx92++) {
        filesArray2.push(files[idx92]);
    }

    const filesType = getFilesType(filesArray2);

    for (let i2 = 0; i2 < filesType.length; i2++) {
        if (filesType[i2] === 'image/jpeg') {
            return false;
        } else if (filesType[i2] === 'image/png') {
            return false;
        } else {
            let ierr21 = setInterval(function() {
                if (document.querySelector(".errors-blo")){
                    clearInterval(ierr21);
                } else {
                    let elemErrors21 = document.createElement('div');
                    let closeErrors21 = document.createElement('span');

                    errorDivBlock.appendChild(elemErrors21);

                    elemErrors21.classList.add('errors-blo');

                    let myError21 = document.querySelector(".errors-blo");

                    myError21.innerText = 'This file type is not allowed.';

                    myError21.appendChild(closeErrors21);
                    closeErrors21.classList.add('errors-close');
                    closeErrors21.onclick = function() {
                        errorDivBlock.removeChild(elemErrors21);
                    }
                    clearInterval(ierr21);
                }
            }, 100);
            break;
        }
    }
}

function checkFilesSize (files) {
    let filesArray3 = [];

    for (let idx = 0; idx < files.length; idx++) {
        filesArray3.push(files[idx]);
    }
    const filesSize = getFilesSize(customDNDUploadFiles) + getFilesSize(filesArray3);
    for (let i = 0; i < filesArray3.length; i++) {
        if (filesSize > 10485760) {
            let ierr = setInterval(function() {
                if (document.querySelector(".errors-blo")){
                    clearInterval(ierr);
                } else {
                    let elemErrors = document.createElement('div');
                    let closeErrors = document.createElement('span');

                    errorDivBlock.appendChild(elemErrors);

                    elemErrors.classList.add('errors-blo');

                    let myError = document.querySelector(".errors-blo");

                    myError.innerText = 'This file exceeds the maximum allowed size.';

                    myError.appendChild(closeErrors);
                    closeErrors.classList.add('errors-close');
                    closeErrors.onclick = function() {
                        errorDivBlock.removeChild(elemErrors);
                    }
                    clearInterval(ierr);
                }
            }, 100);

            break;
        } else {
            return false;
        }
    }
}
function getFilesSize(files) {
    return files.reduce((acc, file) => acc + file.size, 0);
}
function getFilesType (files) {
    let fileTypes = [];
    files.reduce((acc, file) => fileTypes.push(file.type), '');

    return fileTypes;
}

let pop21 = setInterval(function() {
    if (document.querySelector(".dialog-type-lightbox")) {
        document.getElementById('form-field-files').value = '';
        document.querySelector('.elementor-form').reset();
        document.querySelector('.elementor-form .new-select').classList.remove('select-act');
        document.querySelector('.elementor-form .new-select').innerText = 'Request for quote';

        let LisR = document.querySelectorAll('#uploadImagesList .item');

        for (let n = 0; n < LisR.length; n++) {
            LisR[n].remove();
        }


        if (document.querySelector(".errors-block-full").contains(document.querySelector(".errors-block-full .errors-blo"))) {
            document.querySelector(".errors-block-full").removeChild(document.querySelector(".errors-block-full .errors-blo"));

            clearInterval(pop21);
        } else {
            clearInterval(pop21);
        }
    }
}, 100);

var queue = [];
var form = jQuery('form');
var imagesList = jQuery('#uploadImagesList');
let legtAr = 0;
var itemPreviewTemplate = imagesList.find('.item.template').clone();

itemPreviewTemplate.removeClass('template');
imagesList.find('.item.template').remove();

function preview(file) {
    var reader = new FileReader();
    reader.addEventListener('load', function(event) {
        var img = document.createElement('img');

        var itemPreview = itemPreviewTemplate.clone();

        if (file.type === 'image/jpeg' || file.type === 'image/png') {
            itemPreview.find('.img-wrap img').attr('src', event.target.result);
        } else {
            itemPreview.find('.img-wrap img').attr('src', '/wp-content/themes/hello-elementor/assets/icons/icons8-файл.svg');
        }
        itemPreview.data('id', file.name);

        imagesList.append(itemPreview);

        itemPreview.find('.file-name').attr('text', file.name);

        jQuery('ul#uploadImagesList').children().each(function() {
            let text4 = jQuery(this).children('.file-name').attr('text');
            let text5 = '';
            if (text4.length > 14) {
                text5 = text4.substr(0, 14) + '...'
            } else {
                text5 = text4;
            }
            jQuery(this).children('.file-name').text(text5);
        });

        queue.push(file);

    });
    reader.readAsDataURL(file);
}

imagesList.on('click', '.delete-link', function () {
    let newFileList = new DataTransfer();
    let tmpArray = [];
    var item = jQuery(this).closest('.item'),
        id = item.data('id');

    for (let e = 0; e < files_list.length; e++) {
        tmpArray.push(files_list[e]);
    }

    function removeElementByName(arr, name){
        return arr.filter( e => e.name !== name );
    }

    tmpArray = removeElementByName(tmpArray, id)

    document.getElementById('form-field-files').value = '';

    let files_list2 = new DataTransfer();

    for (let w = 0; w < tmpArray.length; w++) {
        files_list2.items.add(tmpArray[w]);
    }

    files_list = files_list2.files;

    item.remove();

    jQuery('#form-field-files').prop('files',files_list)
});
