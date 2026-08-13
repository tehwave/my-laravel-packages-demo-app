<?php

namespace App\Timeline;

use Illuminate\Database\Eloquent\Model;
use tehwave\Timelines\Contracts\TimelineParticipantPresenter;
use tehwave\Timelines\Enums\ParticipantRole;
use tehwave\Timelines\Rendering\RenderedParticipant;
use tehwave\Timelines\Rendering\TimelineRenderContext;

class UserTimelinePresenter implements TimelineParticipantPresenter
{
    public function present(Model $model, ParticipantRole $role, TimelineRenderContext $context): RenderedParticipant
    {
        return new RenderedParticipant(
            type: $model->getMorphClass(),
            id: (string) $model->getKey(),
            text: (string) $model->getAttribute('name'),
            url: null,
        );
    }
}
