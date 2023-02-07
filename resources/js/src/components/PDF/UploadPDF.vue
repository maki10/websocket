<template>
    <form class="was-validated">
        <div class="col-md-4 mb-2">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" accept="application/pdf" required @change="uploadPDF($event)">
                <label class="custom-file-label" for="validatedCustomFile">Upload PDF</label>
                <div class="invalid-feedback" v-if="error">Error</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" @click.prevent="savePdf">Submit</button>
    </form>
</template>

<script>
import UploadPDF from './UploadPDF';
export default UploadPDF;
</script>
