<template>
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">Upload PDF</div>
                <div class="card-body">
                    <form class="was-validated" ref="uploadPdfForm">
                        <div class="col-md-4 mb-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" accept="application/pdf" required @change="uploadPDF($event)">
                                <label class="custom-file-label" for="validatedCustomFile">Upload PDF</label>
                                <div class="invalid-feedback" v-if="error">{{ error }}</div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <button type="submit" class="btn btn-primary" @click.prevent="savePdf">Submit</button>
                        </div>

                        <div class="col-md-4 mb-2" v-if="savingState.length">
                            <div v-for="(state, key) in savingState" :key="key" :class="{'alert': true, 'alert-success': state.success, 'alert-danger': !state.success}" role="alert">
                                {{ state.state }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UploadPDF from './UploadPDF';
export default UploadPDF;
</script>
