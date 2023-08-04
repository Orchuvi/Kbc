import { ChangeDetectorRef, Component, ElementRef, HostListener, OnDestroy, OnInit, ViewChild } from '@angular/core';
import { ApiServiceService } from '../api-service.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent implements OnInit, OnDestroy {

  name: string = '';
  intervalId:any;
  private audio = new Audio();
  private audioSrc = '/assets/audio/Kbc Theme.mp3';

  constructor(private service: ApiServiceService,private cdr:ChangeDetectorRef) {
    this.audio.src = this.audioSrc;
  }
  @ViewChild('myText') myText!: ElementRef;

  ngAfterViewInit() {
    this.intervalId = setInterval(() => {
      this.myText.nativeElement.style.display = 'block';
      setTimeout(() => {
        this.myText.nativeElement.style.display = 'none';
      }, 2000);
    }, 3000);
  }

  ngOnInit() {
    this.service.getQuestions().subscribe((res: any) => {
      console.log(res);
    });
  }
  @HostListener('window:click')
  onWindowClick() {
    this.playAudio();
  }

  playAudio() {
    this.audio.play();
    this.audio.loop = true;
  }

  ngOnDestroy() {
    clearInterval(this.intervalId);
    this.audio.pause();
    this.audio.loop = false;
  }

}
