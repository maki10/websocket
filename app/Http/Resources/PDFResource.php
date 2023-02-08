<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PDFResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'name' => $this->file_name,
            'excerpt' => $this->returnSentenceAsExcerpt($this->text),
            'created_at' => $this->created_at->diffForHumans()
        ];
    }

    private function returnSentenceAsExcerpt(string $content): string
    {
        $numWordsToWrap = 10;

        $words = preg_split('/\s+/', $content);
        $wholeWord = array_filter($words, function ($word) {
            return preg_match('/^'. $this->searchTerm .'/i', $word);
        });

        if (($pos = array_search(reset($wholeWord), $words)) !== FALSE) {
            $start = ($pos - $numWordsToWrap > 0) ? $pos - $numWordsToWrap : 0;
            $length = (($pos + ($numWordsToWrap + 1) < count($words)) ? $pos + ($numWordsToWrap + 1) : count($words) - 1) - $start;
            $slice = array_slice($words, $start, $length);

            return implode(' ', $slice);
        }

        return '';
    }
}
