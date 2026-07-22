@extends('layouts.app')
@section('title', 'Sertifikat Gallery')

@push('styles')
<style>
.masonry-grid {
    column-count: 2;
    column-gap: 1.5rem;
}
@media (min-width: 768px) { .masonry-grid { column-count: 3; } }
@media (min-width: 1024px) { .masonry-grid { column-count: 4; } }

.masonry-item {
    break-inside: avoid;
    margin-bottom: 1.5rem;
}

.cert-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 1rem;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}
.cert-card:hover {
    border-color: rgba(37,99,235,0.4);
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}
.cert-card-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.7);
    opacity: 0;
    transition: opacity 0.3s;
    display: flex;
    items-align: center;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 0.5rem;
}
.cert-card:hover .cert-card-overlay { opacity: 1; }

/* Modal */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.9);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}
.modal-overlay.active {
    opacity: 1;
    pointer-events: all;
}
.modal-content {
    background: #111118;
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 1.25rem;
    max-width: 800px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    transform: scale(0.9);
    transition: transform 0.3s ease;
}
.modal-overlay.active .modal-content {
    transform: scale(1);
}

/* Filter buttons */
.filter-btn {
    padding: 0.5rem 1.25rem;
    border-radius: 9999px;
    border: 1px solid rgba(255,255,255,0.1);
    color: #94a3b8;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    background: transparent;
}
.filter-btn:hover, .filter-btn.active {
    background: rgba(37,99,235,0.15);
    border-color: rgba(37,99,235,0.4);
    color: #93c5fd;
}

html.light .cert-card {
    background: white;
    border-color: rgba(0,0,0,0.06);
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-certificate"></i> Certificates</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Gallery <span class="gradient-text">Sertifikat</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Koleksi sertifikat dari berbagai seminar, workshop, pelatihan, dan kompetisi yang telah saya ikuti.
            </p>
        </div>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-3 mb-12" data-aos="fade-up">
            @php
            $categories = [
                'all' => 'Semua',
                'certification' => 'Sertifikasi',
                'training' => 'Pelatihan',
                'workshop' => 'Workshop',
                'seminar' => 'Seminar',
                'webinar' => 'Webinar',
                'achievement' => 'Prestasi',
                'competition' => 'Kompetisi',
            ];
            @endphp
            @foreach($categories as $key => $label)
            <button class="filter-btn {{ $activeCategory === $key ? 'active' : '' }}"
                    data-filter="{{ $key }}"
                    onclick="filterCerts('{{ $key }}')">
                {{ $label }}
            </button>
            @endforeach
        </div>

        <!-- Stats -->
        <div class="flex justify-center gap-8 mb-12 text-center" data-aos="fade-up">
            <div>
                <div class="text-2xl font-bold gradient-text">{{ $certificates->count() }}</div>
                <div class="text-slate-500 text-sm">Total Sertifikat</div>
            </div>
            <div>
                <div class="text-2xl font-bold gradient-text">{{ $certificates->where('category', 'certification')->count() }}</div>
                <div class="text-slate-500 text-sm">Sertifikasi Profesi</div>
            </div>
            <div>
                <div class="text-2xl font-bold gradient-text">{{ $certificates->whereIn('category', ['training', 'workshop', 'webinar'])->count() }}</div>
                <div class="text-slate-500 text-sm">Pelatihan & Workshop</div>
            </div>
        </div>

        <!-- Masonry Gallery -->
        @if($certificates->count() > 0)
        <div class="masonry-grid" id="cert-grid">
            @foreach($certificates as $i => $cert)
            <div class="masonry-item cert-item" data-category="{{ $cert->category }}" data-aos="zoom-in" data-aos-delay="{{ ($i % 4) * 60 }}">
                <div class="cert-card" onclick="openModal({{ $cert->id }})">
                    @if($cert->thumbnail)
                    <div class="relative">
                        <img src="{{ Storage::url($cert->thumbnail) }}" alt="{{ $cert->name }}"
                             class="w-full object-cover">
                        <div class="cert-card-overlay">
                            <i class="fas fa-expand text-white text-2xl"></i>
                            <span class="text-white text-sm">Lihat Detail</span>
                        </div>
                    </div>
                    @elseif($cert->image)
                    <div class="relative">
                        <img src="{{ Storage::url($cert->image) }}" alt="{{ $cert->name }}"
                             class="w-full object-cover">
                        <div class="cert-card-overlay">
                            <i class="fas fa-expand text-white text-2xl"></i>
                            <span class="text-white text-sm">Lihat Detail</span>
                        </div>
                    </div>
                    @else
                    <div class="h-32 bg-gradient-to-br from-blue-900/40 to-indigo-900/40 flex items-center justify-center relative">
                        <i class="fas fa-certificate text-blue-500/40 text-4xl"></i>
                        <div class="cert-card-overlay">
                            <i class="fas fa-eye text-white text-xl"></i>
                        </div>
                    </div>
                    @endif
                    <div class="p-4">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="text-white text-sm font-semibold leading-tight">{{ $cert->name }}</h3>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20 flex-shrink-0">
                                {{ $cert->category_label }}
                            </span>
                        </div>
                        @if($cert->issuer)
                        <p class="text-slate-400 text-xs mb-1">{{ $cert->issuer }}</p>
                        @endif
                        @if($cert->date)
                        <p class="text-slate-500 text-xs"><i class="fas fa-calendar mr-1"></i>{{ $cert->date->format('M Y') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20 text-slate-500">
            <i class="fas fa-certificate text-6xl opacity-20 mb-4"></i>
            <p>Belum ada sertifikat yang ditampilkan.</p>
        </div>
        @endif
    </div>
</div>

<!-- Modal -->
<div class="modal-overlay" id="cert-modal" onclick="closeModalOutside(event)">
    <div class="modal-content" id="modal-inner">
        <div class="p-6 border-b border-white/5 flex items-center justify-between">
            <h3 class="text-white font-semibold text-lg" id="modal-title">Detail Sertifikat</h3>
            <button onclick="closeModal()" class="w-8 h-8 rounded-lg glass flex items-center justify-center text-slate-400 hover:text-white transition-all">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-6" id="modal-body">
            <div class="flex items-center justify-center py-8">
                <div class="w-8 h-8 border-2 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Certificate data for modal
const certs = {
    @foreach($certificates as $cert)
    {{ $cert->id }}: {
        id: {{ $cert->id }},
        name: "{{ addslashes($cert->name) }}",
        category: "{{ $cert->category_label }}",
        issuer: "{{ addslashes($cert->issuer ?? '') }}",
        date: "{{ $cert->date ? $cert->date->format('d M Y') : '' }}",
        certNum: "{{ addslashes($cert->certificate_number ?? '') }}",
        description: "{{ addslashes($cert->description ?? '') }}",
        thumbnail: "{{ $cert->thumbnail ? Storage::url($cert->thumbnail) : '' }}",
        image: "{{ $cert->image ? Storage::url($cert->image) : '' }}",
        filePdf: "{{ $cert->file_pdf ? Storage::url($cert->file_pdf) : '' }}",
        noExpiry: {{ $cert->no_expiry ? 'true' : 'false' }},
        expiredDate: "{{ $cert->expired_date ? $cert->expired_date->format('d M Y') : '' }}",
    },
    @endforeach
};

function openModal(id) {
    const cert = certs[id];
    if (!cert) return;

    const modal = document.getElementById('cert-modal');
    document.getElementById('modal-title').textContent = cert.name;

    let imageHtml = '';
    const imgSrc = cert.image || cert.thumbnail;
    if (imgSrc) {
        imageHtml = `<div class="mb-6 rounded-xl overflow-hidden border border-white/5">
            <img src="${imgSrc}" alt="${cert.name}" class="w-full object-contain max-h-80">
        </div>`;
    }

    let pdfBtn = '';
    if (cert.filePdf) {
        pdfBtn = `<a href="${cert.filePdf}" target="_blank" 
                     class="flex items-center gap-2 px-4 py-2.5 bg-red-500/10 border border-red-500/25 text-red-400 rounded-lg text-sm hover:bg-red-500/20 transition-all">
                     <i class="fas fa-file-pdf"></i> Lihat PDF
                  </a>`;
    }
    if (imgSrc) {
        pdfBtn += `<a href="${imgSrc}" target="_blank"
                      class="flex items-center gap-2 px-4 py-2.5 bg-blue-500/10 border border-blue-500/25 text-blue-400 rounded-lg text-sm hover:bg-blue-500/20 transition-all">
                      <i class="fas fa-expand"></i> Fullscreen
                   </a>`;
    }

    document.getElementById('modal-body').innerHTML = `
        ${imageHtml}
        <div class="space-y-3 mb-6">
            ${cert.category ? `<div class="flex items-center gap-3">
                <span class="text-slate-500 text-sm w-28">Kategori</span>
                <span class="text-xs px-2.5 py-1 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">${cert.category}</span>
            </div>` : ''}
            ${cert.issuer ? `<div class="flex items-center gap-3">
                <span class="text-slate-500 text-sm w-28">Penyelenggara</span>
                <span class="text-white text-sm">${cert.issuer}</span>
            </div>` : ''}
            ${cert.date ? `<div class="flex items-center gap-3">
                <span class="text-slate-500 text-sm w-28">Tanggal</span>
                <span class="text-white text-sm">${cert.date}</span>
            </div>` : ''}
            ${cert.certNum ? `<div class="flex items-center gap-3">
                <span class="text-slate-500 text-sm w-28">No. Sertifikat</span>
                <span class="text-white text-sm font-mono">${cert.certNum}</span>
            </div>` : ''}
            ${cert.noExpiry ? `<div class="flex items-center gap-3">
                <span class="text-slate-500 text-sm w-28">Validitas</span>
                <span class="text-green-400 text-sm flex items-center gap-1"><i class="fas fa-infinity text-xs"></i> Tidak Kedaluwarsa</span>
            </div>` : (cert.expiredDate ? `<div class="flex items-center gap-3">
                <span class="text-slate-500 text-sm w-28">Kedaluwarsa</span>
                <span class="text-yellow-400 text-sm">${cert.expiredDate}</span>
            </div>` : '')}
        </div>
        ${cert.description ? `<p class="text-slate-400 text-sm leading-relaxed mb-6">${cert.description}</p>` : ''}
        ${pdfBtn ? `<div class="flex flex-wrap gap-3">${pdfBtn}</div>` : ''}
    `;

    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('cert-modal').classList.remove('active');
    document.body.style.overflow = '';
}

function closeModalOutside(e) {
    if (e.target === document.getElementById('cert-modal')) closeModal();
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeModal();
});

// Filter
function filterCerts(category) {
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.toggle('active', btn.dataset.filter === category);
    });

    document.querySelectorAll('.cert-item').forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });

    history.pushState(null, '', '?category=' + category);
}
</script>
@endpush
