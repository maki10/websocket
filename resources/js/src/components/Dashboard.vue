<template>
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">My PDFs</div>

                <div class="card-body" v-if="pdfs.data.length">
                    <div class="list-group">
                        <a v-for="pdf in pdfs.data" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ pdf.name }}</h5>
                                <small>{{ pdf.created_at }}</small>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="card-body" v-else>
                    No PDfs
                </div>

                <div class="card-footer">
                    <nav>
                        <ul class="pagination">
                            <li v-if="pdfs.links.prev" class="page-item"><a class="page-link" @click="paginate(pdfs.links.prev)">Previous</a></li>
                            <li v-if="pdfs.links.next" class="page-item"><a class="page-link" @click="paginate(pdfs.links.next)">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search text in my PDFs</div>

                <div class="card-body" v-if="searchPdfs.length">
                    <div class="col-md-4">
                        <form>
                            <div class="form-group">
                                <input v-model="search" type="text" class="form-control" placeholder="Search..">
                            </div>
                        </form>
                    </div>
                    <div class="list-group">
                        <a v-for="pdf in searchPdfs" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ pdf.name }}</h5>
                                <small>{{ pdf.created_at }}</small>
                            </div>
                            <small>{{ pdf.excerpt }}</small>
                        </a>
                    </div>
                </div>

                <div class="card-body" v-else>
                    <div class="col-md-4">
                        <form>
                            <div class="form-group">
                                <input v-model="search" type="text" class="form-control" placeholder="Search..">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import Dashboard from './Dashboard';
export default Dashboard;
</script>
