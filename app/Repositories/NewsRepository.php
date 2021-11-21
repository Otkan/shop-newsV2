<?php

use Illuminate\Database\Query\Builder;

class NewsRepository
{

    public function build(): self
    {
        $this->setGetClosure(function (Builder $builder) use ($helpParams) {
            $builder->select(self::PRIMARY);

            if ($helpParams->has($helpParams::GROUP)) {
                $group = $helpParams->getSanitized($helpParams::GROUP);
                $builder->where('group_id', '=', HelpGroupEnum::getNameKey($group));
            }

            if ($helpParams->has($helpParams::STATUS)) {
                $status = $helpParams->getSanitized($helpParams::STATUS);
                $builder->where('status', '=', HelpStatusEnum::getNameKey($status));
            }

            /**
             * Default order
             */
            if (empty($builder->orders)) {
                $builder->orderBy('order', 'asc');
            }

            return $this->getSimpleResultArray();
        });

        return $this->setSource(__METHOD__)
            ->setFilter($helpParams->toSanitizedArray());
    }


}
