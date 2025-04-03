<div>
 <span
     class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium  {{ $stock == 0 ? ' bg-red-600 text-white' : 'bg-green-600 text-white' }}">
            {{ $stock == 0 ? 'Rupture de stock' : 'En stock' }}
          </span>
</div>
