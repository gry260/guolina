

<ul style="position: absolute; margin-left: 325px; list-style: none; z-index:10000000000000000000;" >
  <li *ngFor="let item of Words; let i = index" style="cursor: pointer">
{{ item.word }}
  </li>
</ul>
